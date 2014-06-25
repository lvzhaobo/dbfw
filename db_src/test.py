import os, sys, string,getopt
import mysql.connector

def main():
    print sys.argv[0]
    

    for op, value in opts:
        print value
    
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

#print data
    if alldata:
        data = []
        for rec in alldata:
            #print rec[0]+"\t"+rec[1]
            data.append(rec[0]+"\t"+rec[1])
        file_object = open('data.txt', 'w+')
        file_object.write("\n".join(data))
        file_object.close( )

    cursor.close()
    conn.close()
class mysql_db:
    def test(self):
        print "test"
    
def adduser():
    #a = mysql_db()
    #a.test()
    print "adduser"
    
if __name__ == "__main__":
    opts, args = getopt.getopt(sys.argv[1:], "ha:")
	
    if(args[0] == "adduser"):
        a = mysql_db()
        a.test()


#print '{"page":1,"total":239,"rows":[{"id":"ZW","cell":{"name":"Zimbabwe ","iso":"ZW","printable_name":"Zimbabwe ","iso3":"ZWE ","numcode":"716"}},{"id":"ZM","cell":{"name":"Zambia ","iso":"ZM","printable_name":"Zambia ","iso3":"ZMB ","numcode":"894"}},{"id":"YE","cell":{"name":"Yemen ","iso":"YE","printable_name":"Yemen ","iso3":"YEM ","numcode":"887"}},{"id":"EH","cell":{"name":"Western Sahara ","iso":"EH","printable_name":"Western Sahara ","iso3":"ESH ","numcode":"732"}},{"id":"WF","cell":{"name":"Wallis and Futuna ","iso":"WF","printable_name":"Wallis and Futuna ","iso3":"WLF ","numcode":"876"}},{"id":"VI","cell":{"name":"Virgin Islands, U.s. ","iso":"VI","printable_name":"Virgin Islands, U.s. ","iso3":"VIR ","numcode":"850"}},{"id":"VG","cell":{"name":"Virgin Islands, British ","iso":"VG","printable_name":"Virgin Islands, British ","iso3":"VGB ","numcode":"92"}},{"id":"VN","cell":{"name":"Viet Nam ","iso":"VN","printable_name":"Viet Nam ","iso3":"VNM ","numcode":"704"}},{"id":"VE","cell":{"name":"Venezuela ","iso":"VE","printable_name":"Venezuela ","iso3":"VEN ","numcode":"862"}},{"id":"VU","cell":{"name":"Vanuatu ","iso":"VU","printable_name":"Vanuatu ","iso3":"VUT ","numcode":"548"}}],"post":[]}'
