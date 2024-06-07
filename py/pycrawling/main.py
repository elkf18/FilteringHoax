import requests
import pandas as pd
from bs4 import BeautifulSoup
import datetime
from datetime import datetime
import MySQLdb
from dateutil import parser


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
            url = f"{self.base_url}?query={self.keywords}&sortby=time&page={page}"

            page = requests.get(url)
            soup = BeautifulSoup(page.text, "html.parser")

            articles = soup.find_all("article")

            for article in articles:
                title = article.find("h2", {"class": "title"}).get_text()
                published_time = article.find(
                    "span", {"class": "date"}).get_text().split(",")[1]
                image = article.find("img")["src"]
                href = article.find("a")["href"]
                body = article.find("p").get_text()
                url2 = href
                page2 = requests.get(url2)
                soup2 = BeautifulSoup(page2.text, "html.parser")
                content = soup2.find_all('p')
                content = ' '.join(map(str, content))
                
                article_lists.append({
                    "title": title,
                    "published_time": published_time,
                    "body": body,
                    "content": content,
                    "image": image,
                    "href": href})
                db = MySQLdb.connect(HOST, USERNAME, PASSWORD, DATABASE)
                # tb_berita = []
                # prepare a cursor object using cursor() method
                cursor = db.cursor()
                # tb_berita = []

                # Prepare SQL query to INSERT a record into the database.
                id_admin = 1
                id_kategori = 1
                id_status = 1
                # published_time = '10 Mei 2022 21:53 WIB'
                # published_time_WIB = published_time.replace('WIB', '')
                # for published_time_WIB in published_time:
                #         published_time_WIB = published_time.replace('WIB', '').replace('00:00', '').replace('00:01', '').replace('00:02', '').replace('00:03', '').replace('00:04', '').replace('00:05', '').replace('00:06', '').replace('00:07', '').replace('00:08', '').replace('00:09', '').replace('00:10', '').replace('00:11', '').replace('00:12', '').replace('00:13', '').replace('00:14', '').replace('00:15', '').replace('00:16', '').replace('00:17', '').replace('00:18', '').replace('00:19', '').replace('00:20', '').replace('00:21', '').replace('00:22', '').replace('00:23', '').replace('00:24', '').replace('00:25', '').replace('00:26', '').replace('00:27', '').replace('00:28', '').replace('00:29', '').replace('00:30', '').replace('00:31', '').replace('00:32', '').replace('00:33', '').replace('00:34', '').replace('00:35', '').replace('00:36', '').replace('00:37', '').replace('00:38', '').replace('00:39', '').replace('00:40', '').replace('00:41', '').replace('00:42', '').replace('00:43', '').replace('00:44', '').replace('00:45', '').replace('00:46', '').replace('00:47', '').replace('00:48', '').replace('00:49', '').replace('00:50', '').replace('00:51', '').replace('00:52', '').replace('00:53', '').replace('00:54', '').replace('00:55', '').replace('00:56', '').replace('00:57', '').replace('00:58', '').replace('00:59', '').replace('01:00', '').replace('01:01', '').replace('01:02', '').replace('01:03', '').replace('01:04', '').replace('01:05', '').replace('01:06', '').replace('01:07', '').replace('01:08', '').replace('01:09', '').replace('01:10', '').replace('01:11', '').replace('01:12', '').replace('01:13', '').replace('01:14', '').replace('01:15', '').replace('01:16', '').replace('01:17', '').replace('01:18', '').replace('01:19', '').replace('01:20', '').replace('01:21', '').replace('01:22', '').replace('01:23', '').replace('01:24', '').replace('01:25', '').replace('01:26', '').replace('01:27', '').replace('01:28', '').replace('01:29', '').replace('01:30', '').replace('01:31', '').replace('01:32', '').replace('01:33', '').replace('01:34', '').replace('01:35', '').replace('01:36', '').replace('01:37', '').replace('01:38', '').replace('01:39', '').replace('01:40', '').replace('01:41', '').replace('01:42', '').replace('01:43', '').replace('01:44', '').replace('01:45', '').replace('01:46', '').replace('01:47', '').replace('01:48', '').replace('01:49', '').replace('01:50', '').replace('01:51', '').replace('01:52', '').replace('01:53', '').replace('01:54', '').replace('01:55', '').replace('01:56', '').replace('01:57', '').replace('01:58', '').replace('01:59', '')
                for published_time_WIB in published_time:
                        published_time_WIB = published_time[0:12]
                for published_time_indo in published_time_WIB:
                        published_time_indo = published_time_WIB.replace("Januari", "Jan").replace("Februari", "Feb").replace("Maret", "Mar").replace("April", "Apr").replace("Mei", "Mei").replace("Juni", "Jun").replace("Juli", "Jul").replace("Agustus", "Agu").replace("September", "Sep").replace("Oktober", "Okt").replace("November", "Nov").replace("Desember", "Des")
                # for date_berita in published_time_indo:
                #     date_berita = datetime.strptime(published_time_indo, '%d %B %Y %H:%M ')
                
                # date_berita = datetime.strptime(
                #     published_time_indo, '%d %B %Y %H:%M ')
                sql = "insert into tb_berita (id_admin, id_kategori, id_status,judul, tgl_berita, isi, gambar, sumber) values (%s,%s,%s,%s,%s,%s,%s,%s)"
                cursor.execute(
                    sql, (id_admin, id_kategori, id_status, title, published_time_indo, content, image, href))
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
    keywords = "kesehatan"
    # keywords = input("[~] Keywords     : ")
    pages = 1
    # pages = input("[~] Total Pages  : ")
    base_url = f"https://www.detik.com/search/searchall"

    scrape = Scraper(keywords, pages)
    response = scrape.fetch(base_url)
    articles = scrape.get_articles(response)

    print("[~] Program Finished")
