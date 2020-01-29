import pymysql


def createConnection(host,port,user = "root",password = "password"):
    
    try:
        conn = pymysql.connect(host = host, port = int(port), user = user,
                               password = password)
        print("Sucessfully connected to database.")
        
    except Exception as e:
        print("DATABASE CONNECTION ERROR:",e)
        conn = None


    return conn

