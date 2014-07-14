import os, sys, string,getopt
import mysql.connector
import json

class mysql_db(object):
    conn = ""
    cursor = ""
    
    def get_user(self):
        try:
            conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
            cursor = conn.cursor()
        except Exception, e:
            print e
        
        sql = "select * from user"
        cursor.execute(sql)
        alldata = cursor.fetchall()
        
        if alldata:
            for rec in alldata:
                try:
                    sql_show_grants = "show grants for '"+rec[1]+"'@'"+rec[0]+"';"
                    grant = cursor.execute(sql_show_grants)
                    a = cursor.fetchall()
                    priv = json.dumps(a[0])
                except Exception,e:
                    #print e
                    priv = ""
                
                print rec[0]+"\t"+rec[1]+"\t"+priv

        cursor.close()
        conn.close()
    
    def get_db_list(self):
        try:
            conn = mysql.connector.connect(host='localhost', user='root',passwd='111111',db='mysql')
            cursor = conn.cursor()
            sql = "show databases;"
            cursor.execute(sql)
            alldata = cursor.fetchall()
        except Exception, e:
            print e
        
        if alldata:
            for rec in alldata:
                print rec[0]
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
    
    if args[0] == "dblist":
        a = mysql_db()
        a.get_db_list()