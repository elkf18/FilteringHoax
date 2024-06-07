import requests
import pandas as pd
from bs4 import BeautifulSoup
from datetime import datetime
import MySQLdb

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
                article_lists.append({
                    "title": title,
                    "published_time": published_time,
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
                # published_time = "09 Desember 2022 20:35 WIB"
                published_time_WIB = published_time.replace('WIB', '')
                # for bulan in (("Januari", "January"), ("Februari", "February"), ("Maret", "March"), ("April", "April"), ("Mei", "May"), ("Juni", "June"), ("Juli", "July"), ("Agustus", "August"), ("September", "September"), ("Oktober", "October"), ("November", "November"), ("Desember", "December")):
                    # published_time_indo =  published_time_WIB.replace(*bulan)
                # published_time_indo = published_time_WIB.replace([("Januari", "January"), ("Februari", "February"), ("Maret", "March"), ("April", "April"), ("Mei", "May"), ("Juni", "June"), ("Juli", "July"), ("Agustus", "August"), ("September", "September"), ("Oktober", "October"), ("November", "November"), ("Desember", "December")])
                for published_time_indo in published_time_WIB:
                    published_time_indo = published_time_WIB.replace("Januari", "January").replace("Februari", "February").replace("Maret", "March").replace("April", "April").replace("Mei", "May").replace("Juni", "June").replace("Juli", "July").replace("Agustus", "August").replace("September", "September").replace("Oktober", "October").replace("November", "November").replace("Desember", "December")
                for date_berita in published_time_indo:
                    date_berita = datetime.strptime(published_time_indo, '%d %B %Y %H:%M ')
                # published_time_indo = published_time_WIB
                # published_time_indo = published_time_WIB
                # published_time_indo = published_time_WIB
                # date_berita = datetime.strptime(published_time_indo, '%d %B %Y %H:%M ')
                sql = "insert into tb_berita (id_admin, id_kategori, id_status, judul, tgl_berita, gambar, sumber) values (%s,%s,%s,%s,%s,%s,%s)"
                cursor.execute(sql, (id_admin, id_kategori, id_status, title, date_berita, image , href))
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
            # print(date_berita)
            print(f"[~] Total Articles: {len(self.articles)}")

        return self.articles

    def show_results(self, row=5):
        df = pd.DataFrame(self.articles)
        df.index += 1
        if row:
            print(df.head())
        else:
            print(df)


if __name__ == '__main__':
    keywords = input("[~] Keywords     : ")
    pages = input("[~] Total Pages  : ")
    base_url = f"https://www.detik.com/search/searchall"

    scrape = Scraper(keywords, pages)
    response = scrape.fetch(base_url)
    articles = scrape.get_articles(response)

    print("[~] Program Finished")
