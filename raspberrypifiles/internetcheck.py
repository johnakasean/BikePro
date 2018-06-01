#found at: https://stackoverflow.com/questions/10609358/python-wait-until-connection-active
import urllib2

def internet_on():
    try:
        response=urllib2.urlopen('http://74.125.113.99',timeout=1)
        main()
    except urllib2.URLError:
    internet_on()import urllib2

def main():
    #the script stuff

def internet_on():
    try:
        response=urllib2.urlopen('http://74.125.113.99',timeout=1)
        main()
    except urllib2.URLError:
    internet_on()