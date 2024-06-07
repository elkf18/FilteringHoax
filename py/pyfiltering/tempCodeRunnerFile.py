conn_string = "host='localhost' dbname='db_filteringhoax' user='root' password=''"
    # conn = psycopg2.connect(conn_string)
    # cursor = conn.cursor()
    # cursor.execute("SELECT * FROM tb_berita")
    # rows = cursor.fetchall()
    # rowarray_list = []
    # for row in rows:
    #     t = (row[0], row[1], row[2], row[3], row[4], row[5], row[6])
    #     rowarray_list.append(t)
    # j = json.dumps(rowarray_list)
    # with open("student_rowarrays.js", "w") as f:
    #     f.write(j)
    # # Convert query to objects of key-value pairs
    # objects_list = []
    # for row in rows:
    #     d = collections.OrderedDict()
    #     d["id_berita"] = row[0]
    #     d["id_admin"] = row[1]
    #     d["id_kategori"] = row[2]
    #     d["id_status"] = row[3]
    #     d["judul"] = row[4]
    #     d["tgl_berita"] = row[5]
    #     d["isi"] = row[6]
    #     d["gambar"] = row[6]
    #     d["sumber"] = row[6]
    #     d["tgl_filtering"] = row[6]
    #     objects_list.append(d)
    # j = json.dumps(objects_list)
    # with open("student_objects.js", "w") as f:
    #     f.write(j)
    # conn.close()

    # print("[~] Selesai di convert ke JSON!!")
