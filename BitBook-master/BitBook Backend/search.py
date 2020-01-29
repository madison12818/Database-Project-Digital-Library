import sys
import pymysql
import json
#from dbconnect import *




def returnBookList(string):

    string = string.lower()
    #Creates connection
    conn = pymysql.Connection(host="localhost",port=3306,user="root",password="password",db = "bitbook")

    dbhandler = conn.cursor()

    #Check for books that match ISBN or contain the string in their title
    dbhandler.execute("select * from book;")
    book_list = dbhandler.fetchall()

    final_list = []
    #Add books with matching ISBN
    for x in book_list:
        if(string == str(x[0])):
           final_list.append(x)

    #Add books that contain string
    for x in book_list:
        if(string in x[1].lower() and not x in final_list):
            final_list.append(x)

    for x in book_list:
        if(string in x[3].lower() and not x in final_list):
            final_list.append(x)


    #Check if string is an author. If it is, print all their books.
    chosen_authors = []
    dbhandler.execute("select * from author;")
    author_list = dbhandler.fetchall()

    for x in author_list:
        if((string == x[1].lower() + " " + x[2].lower() or string == x[1].lower() or string == x[2].lower()) and not x in final_list):
            chosen_authors.append(x)

    isbn_list = []
    dbhandler.execute("select * from wrote;")
    written_list = dbhandler.fetchall()
    for x in chosen_authors:
        for y in written_list:
            if(x[0] == y[1]):
                isbn_list.append(y[0])

    for x in isbn_list:
        for y in book_list:
            if(x == y[0] and not y in final_list):
                final_list.append(y)

    conn.close()

    return(final_list)

if(__name__=="__main__"):
    #inp = input("Enter a keyword to search for: ")
    #inp = "the"
    inp = sys.argv[1]
    z = returnBookList(inp)
    #print(z)
    i = 0
    v = {}
    for x in z:
        v[i] = {'isbn':int(x[0]),'title':x[1],'published':str(x[2]),'summary':x[3],'copies':int(x[4]),'online':bool(x[5]),'cover':x[6]}
        i += 1
    print(json.dumps(v))
    #print(v)



