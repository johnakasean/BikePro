#scp from: https://askubuntu.com/questions/329370/using-scp-to-copy-files-from-remote-to-home-machine
#sql connector: https://stackoverflow.com/questions/32754461/how-to-install-mysql-connector-via-pip/32754462
#sql insert : https://stackoverflow.com/questions/5687718/how-can-i-insert-data-into-a-mysql-database
#sql: https://dev.mysql.com/doc/connector-python/en/connector-python-example-cursor-transaction.html
#photos: https://www.raspberrypi.org/forums/viewtopic.php?t=67109
import os
import time
import mysql.connector
from mysql.connector import errorcode


try:
    conn = mysql.connector.connect(host="pdb.cxfg2y94di8m.eu-west-1.rds.amazonaws.com",
                         user="johnakasean",
                         passwd="joker1997",
                         db="mc4pdb")

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Something is wrong with your user name or password")

    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exists")

    else:
        print(err)

FRAMES = 1
TIMEBETWEEN = 6
frameCount = 0
imageNumber = 1
imageNumb = 2
imgname = (imageNumber,)
imgnam = (imageNumb,)
os.system("raspistill -o /home/pi/Pictures/image%s.jpg"%(imageNumber),)
time.sleep(TIMEBETWEEN - 6)

while():
    os.system("raspistill -o /home/pi/Pictures/image%s.jpg"%(imageNumb),)
    time.sleep(TIMEBETWEEN - 6) #Takes roughly 6 seconds to take a picture
    
else:
    os.system("scp -i /home/pi/Downloads/newubuntu.pem -r /home/pi/Pictures/* ubuntu@34.240.84.151:/var/www/html/webcam/")
    os.close
cur = conn.cursor()
cur.execute("""INSERT INTO image (imgname)VALUES (%s)""",(imgname))
cur.execute("""INSERT INTO image (imgname)VALUES (%s)""",(imgnam))
conn.commit()
cur.execute("SELECT * FROM image")

rows = cur.fetchall()

for eachRow in rows:
    print eachRow

conn.close()

