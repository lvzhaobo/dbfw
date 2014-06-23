import os, sys, string
import mysql.connector

def main():
#connect to mysql
    try:
        conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
    except Exception, e:
        print e
        sys.exit()
# get cursor
    cursor = conn.cursor()

    #sql = 'select * from user'
    #cursor.execute(sql)
    

# create table
    sql = 'create table if not exists product(Prd_name varchar(128) primary key, Count int(4))'
    cursor.execute(sql)

#insert one data
    sql="insert into product(Prd_name, Count) values('%s', %d)" % ("ATG", 200)
    try:
        cursor.execute(sql)
    except Exception, e:
        print e

#insert some datas
    sql  = "insert into product(Prd_name, Count) values(%s, %s)"
    val  = (("PPS", 400), ("Jr",150), ("Smt", 25))

    try:
        cursor.executemany(sql, val)
    except Exception, e:
        print e

#quary data
    sql = "select * from user"
    cursor.execute(sql)
    alldata = cursor.fetchall()

#quary data
    sql = "select * from user"
    try:
        cursor.execute(sql)
    except Exception, e:
        print e
    alldata = cursor.fetchall()

#print data
    if alldata:
        data = []
        for rec in alldata:
            print rec[0]+"\t"+rec[1]+"\t"+rec[2]
            data.append(rec[0]+"\t"+rec[1]+"\t"+rec[2])
        file_object = open('priv.txt', 'w+')
        file_object.write("\n".join(data))
        file_object.close( )

    cursor.close()
    conn.close()

if __name__ == "__main__":
    main()
    print("\nIt's OK")
