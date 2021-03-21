import requests
from bs4 import BeautifulSoup
import json
import re
import time

def main():
    url = 'https://www.loveholidays.com/holidays/spain/costa-del-sol/torremolinos/bajondillo.htmll'
    r = requests.get(url)
    print(r)
    
if __name__ == "__main__":
    main()    