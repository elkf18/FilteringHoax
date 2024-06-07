import requests
import pandas as pd
from bs4 import BeautifulSoup
import datetime
from datetime import datetime
import MySQLdb
from dateutil import parser
import numpy as np  
import random  
import string


HOST = "localhost"
USERNAME = "root"
PASSWORD = ""
DATABASE = "db_filteringhoax"


class Scraper:
    def __init__(self, keywords, pages):
        self.keywords = keywords
        self.pages = pages

    def fetch(self, base_url):
        self.base_url = base_url

        self.params = {
            'query': self.keywords,
            'sortby': 'time',
            'page': 2
        }

        self.headers = {
            'sec-ch-ua': '"(Not(A:Brand";v="8", "Chromium";v="99", "Google Chrome";v="99"',
            'sec-ch-ua-platform': "Linux",
            'sec-fetch-site': 'same-origin',
            'user-agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.35 Safari/537.36'
        }

        self.response = requests.get(
            self.base_url, params=self.params, headers=self.headers)

        return self.response
    

    def get_articles(self, response):
        article_lists = []

        for page in range(1, int(self.pages)+1):
            url = f"{self.base_url}?query={self.keywords}&p={page}"

            page = requests.get(url)
            soup = BeautifulSoup(page.text, "html.parser")

            articles = soup.find_all("article")

            for article in articles:
                title = article.find("h2").get_text()
                # published_time = article.find(
                image = article.find("img")["src"]
                href = article.find("a")["href"]
                # body = article.find("p").get_text()
                url2 = href
                page2 = requests.get(url2)
                soup2 = BeautifulSoup(page2.text, "html.parser")
                content = soup2.find_all('p')
                content = ' '.join(map(str, content))
                published_time = soup2.find("div", {"class": "date"}).get_text()
                
                article_lists.append({
                    "title": title,
                    "published_time": published_time,
                    # "body": body,
                    "content": content,
                    "image": image,
                    "href": href})
                db = MySQLdb.connect(HOST, USERNAME, PASSWORD, DATABASE)
                # tb_berita = []
                # prepare a cursor object using cursor() method
                cursor = db.cursor()
                # tb_berita = []
                
                x = content
                
                from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory
                from Sastrawi.Stemmer.StemmerFactory import StemmerFactory

                stopwords = StopWordRemoverFactory().get_stop_words() 
                stemmer = StemmerFactory().create_stemmer()

                import re 

                def text_preprocess(text, stemmer, stopwords):
                    x = text.str.replace(r'\W',' ')
                    x = x.str.replace(r'\s+',' ')
                    x = x.str.lower()
                    x = x.apply(lambda x: ' '.join([stemmer.stem(item) for item in x.split() if item not in stopwords]))
                    return x

                processed_text = text_preprocess(x, stemmer, stopwords)
                
                import nltk
                nltk.download()

                wordfreq = {}
                for sentence in processed_text:
                    tokens = nltk.word_tokenize(sentence)
                    for token in tokens:
                        if token not in wordfreq.keys():
                            wordfreq[token] = 1
                        else:
                            wordfreq[token] += 1

                import heapq
                most_freq = heapq.nlargest(300, wordfreq, key=wordfreq.get)
                
                sentence_vectors = []
                for sentence in processed_text:
                    sentence_tokens = nltk.word_tokenize(sentence)
                    sent_vec = []
                    for token in most_freq:
                        if token in sentence_tokens:
                            sent_vec.append(1)
                        else:
                            sent_vec.append(0)
                    sentence_vectors.append(sent_vec)

                sentence_vectors = np.asarray(sentence_vectors)
                
                word_idf_values = {}
                for token in most_freq:
                    doc_containing_word = 0
                    for document in processed_text:
                        if token in nltk.word_tokenize(document):
                            doc_containing_word += 1
                    word_idf_values[token] = np.log(len(x)/(1 + doc_containing_word))


                word_tf_values = {}
                for token in most_freq:
                    sent_tf_vector = []
                    for document in processed_text:
                        doc_freq = 0
                        for word in nltk.word_tokenize(document):
                            if token == word:
                                doc_freq += 1
                        word_tf = doc_freq/len(nltk.word_tokenize(document))
                        sent_tf_vector.append(word_tf)
                    word_tf_values[token] = sent_tf_vector
                    
                tfidf_values = []
                for token in word_tf_values.keys():
                    tfidf_sentences = []
                    for tf_sentence in word_tf_values[token]:
                        tf_idf_score = tf_sentence * word_idf_values[token]
                        tfidf_sentences.append(tf_idf_score)
                    tfidf_values.append(tfidf_sentences)

                tf_idf_model = np.asarray(tfidf_values)
                tf_idf_model = np.transpose(tf_idf_model)
                
                from sklearn.preprocessing import LabelEncoder
                le_label = LabelEncoder()

                # data['label'] = le_label.fit_transform(data['label'])
                # y = data['label']

                # Prepare SQL query to INSERT a record into the database.
                id_admin = 1
                id_kategori = 1
                id_status = 1
                for published_time_indo in published_time:
                        published_time_indo = published_time.replace("Januari", "Jan").replace("January", "Jan").replace("Februari", "Feb").replace("February", "Feb").replace("Maret", "Mar").replace("March", "Mar").replace("April", "Apr").replace("Mei", "Mei").replace("May", "Mei").replace("Juni", "Jun").replace("June", "Jun").replace("Juli", "Jul").replace("July", "Jul").replace("Agustus", "Agu").replace("August", "Agu").replace("September", "Sep").replace("Oktober", "Okt").replace("October", "Okt").replace("November", "Nov").replace("Desember", "Des").replace("December", "Des")
                for published_time_WIB in published_time_indo:
                        published_time_WIB = published_time_indo[0:12]
                sql = "insert into tb_berita (id_admin, id_kategori, id_status,judul, tgl_berita, isi, gambar, sumber) values (%s,%s,%s,%s,%s,%s,%s,%s)"
                cursor.execute(
                    sql, (id_admin, id_kategori, id_status, title, published_time_WIB, le_label, image, href))
                # inptdata = cursor.executemany(sql, tb_berita)
                print("BERHASIL")

                db.commit()
                db.close()

        self.articles = article_lists
        try:
            self.show_results()
        except Exception as e:
            print(e)
        finally:
            print()
            print("[~] Scraping finished!")
            # print(published_time)
            # print(published_time_indo)
            print(f"[~] Total Articles: {len(self.articles)}")

        return self.articles

    def show_results(self, row=5):
        df = pd.DataFrame(self.articles)
        df.index += 1
        if row:
            print(df.head())
        else:
            print(df)

    # def convert(date_time):
    #     format = '%b %d %Y %I:%M%p' # The format
    #     datetime_str = datetime.datetime.strptime(date_time, format)
   
    #     return datetime_str
   
    # # Driver code
    # date_time = published_time
    # print(convert(date_time))

if __name__ == '__main__':
    keywords = input("[~] Keywords     : ")
    pages = input("[~] Total Pages  : ")
    base_url = f"https://www.cnbcindonesia.com/search/"

    scrape = Scraper(keywords, pages)
    response = scrape.fetch(base_url)
    articles = scrape.get_articles(response)

    print("[~] Program Finished")
