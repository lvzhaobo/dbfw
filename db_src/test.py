import os, sys, string,getopt
import mysql.connector
import json

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
class mysql_db(object):
    conn = ""
    cursor = ""
    def test(self):
        print "test"
    
    def get_user(self):
        try:
            conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
        except Exception, e:
            print e
        
        cursor = conn.cursor()
        
        sql = "select * from user"
        cursor.execute(sql)
        alldata = cursor.fetchall()
        
        if alldata:
            data = []
            for rec in alldata:
                try:
                    sql_show_grants = "show grants for '"+rec[1]+"'@'"+rec[0]+"';"
                    grant = cursor.execute(sql_show_grants)
                    a = cursor.fetchall()
                    #print sql_show_grants,json.dumps(a[0])
                    priv = json.dumps(a[0])
                except Exception,e:
                    #print e
                    priv = ""
                
                print rec[0]+"\t"+rec[1]+"\t"+priv
                data.append(rec[0]+"\t"+rec[1])
            file_object = open('data.txt', 'w+')
            file_object.write("\n".join(data))
            file_object.close( )

        cursor.close()
        conn.close()
    def adduser(self,post_data):
        print post_data
        try:
            conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
        except Exception, e:
            print e
        
        try:
            
            
            data = json.loads(post_data)
            cursor = conn.cursor()
            sql_use_db = "use mysql;"
            cursor.execute(sql_use_db)
            
            #sql_a = "GRANT all privileges ON * . * TO 'lv7'@'localhost' IDENTIFIED BY 'lv7';"
            #cursor.execute(sql_a)
            priv_str = ""
            
            priv = []
            print data["auth"]
            for item in data["auth"]:
                priv.append(data["auth"][item])
            priv_str = ",".join(priv)
            print priv_str
            
            sql = "CREATE USER '"+data["username"]+"'@'localhost' IDENTIFIED BY '"+data["password"]+"';"
            sql_1 = "GRANT "+priv_str+" ON * . * TO '"+data["username"]+"'@'localhost' IDENTIFIED BY '"+data["password"]+"';"
            #print sql_a,sql_1
            print sql,sql_1
            sql_add_user = "insert into user (Host,User) values('%','"+data["username"]+"');"
            cursor.execute(sql)
            cursor.execute(sql_1)
            
            sql_show_grants = "show grants for '"+data["username"]+"'@'localhost'"
            a = cursor.execute(sql_show_grants)
            
            conn.commit()
        except Exception,e:
            print e
        print json.loads(data),"dbfw lvzb liun"
        
        cursor.close()
        conn.close()
        
    def getGrants(self,data):
        try:
            conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
        except Exception, e:
            print e
        
        try:
            a = json.loads(data)
            cursor1 = conn.cursor()
            sql_show_grants = "show grants for '"+a["User"]+"'@'"+a["Host"]+"';"
            cursor1.execute(sql_show_grants)
            grants = cursor1.fetchall()
            print grants
            
            conn.commit()
        except Exception,e:
            print e
        
        cursor1.close()
        conn.close()
    
def adduser():
    #a = mysql_db()
    #a.test()
    print "adduser"
    
if __name__ == "__main__":
    opts, args = getopt.getopt(sys.argv[1:], "ha:")
    if(args[0] == "adduser"):
        print "dbfw"
        a = mysql_db()
        a.adduser(args[1])
        
    if args[0]=="list":
        a = mysql_db()
        a.get_user()
        
    if args[0] == "getGrants":
        a = mysql_db()
        a.getGrants(args[1])


#print '{"page":1,"total":239,"rows":[{"id":"ZW","cell":{"name":"Zimbabwe ","iso":"ZW","printable_name":"Zimbabwe ","iso3":"ZWE ","numcode":"716"}},{"id":"ZM","cell":{"name":"Zambia ","iso":"ZM","printable_name":"Zambia ","iso3":"ZMB ","numcode":"894"}},{"id":"YE","cell":{"name":"Yemen ","iso":"YE","printable_name":"Yemen ","iso3":"YEM ","numcode":"887"}},{"id":"EH","cell":{"name":"Western Sahara ","iso":"EH","printable_name":"Western Sahara ","iso3":"ESH ","numcode":"732"}},{"id":"WF","cell":{"name":"Wallis and Futuna ","iso":"WF","printable_name":"Wallis and Futuna ","iso3":"WLF ","numcode":"876"}},{"id":"VI","cell":{"name":"Virgin Islands, U.s. ","iso":"VI","printable_name":"Virgin Islands, U.s. ","iso3":"VIR ","numcode":"850"}},{"id":"VG","cell":{"name":"Virgin Islands, British ","iso":"VG","printable_name":"Virgin Islands, British ","iso3":"VGB ","numcode":"92"}},{"id":"VN","cell":{"name":"Viet Nam ","iso":"VN","printable_name":"Viet Nam ","iso3":"VNM ","numcode":"704"}},{"id":"VE","cell":{"name":"Venezuela ","iso":"VE","printable_name":"Venezuela ","iso3":"VEN ","numcode":"862"}},{"id":"VU","cell":{"name":"Vanuatu ","iso":"VU","printable_name":"Vanuatu ","iso3":"VUT ","numcode":"548"}}],"post":[]}'
