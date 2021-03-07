import requests
from bs4 import BeautifulSoup
import json
import re
import time

def main():

    r = requests.get('https://www.goodsmile.info/en/product/9784/HAGANE+WORKS+Blade+Liger.html')
    soup = BeautifulSoup(r.text, 'lxml')
    
    hagane = soup.find('div', {'id': 'cnt_wrap_hagane_works'})

    print(hagane)
    images = []
    images_list = []

    videos = hagane.find_all('video')

    for v in videos:
        images.append(v.get('poster'))
    
    img_top = hagane.find('img', {'class': 'top_img'})

    if (img_top):
        images_list.append(img_top)

    img_slider = hagane.find_all('ul', {'class', 'slider'})

    for ic in img_slider:
        img_container = ic.find_all('img')

        for i in img_container:
            images_list.append(i)

    more_img = hagane.find_all('div', {'class', 'img_wrap'})

    for ic in more_img:
        img_container = ic.find_all('img')

        for i in img_container:
            images_list.append(i)

    for i in images_list:
        image = i.get('src')
        if image not in images:
            images.append(image)

    page_top = hagane.find('section', {'id': 'section1'})

    subtitle = None
    subtitle_raw = page_top.find('h3')

    if subtitle_raw:
        subtitle = subtitle_raw.text

    page_description = hagane.find('section', {'id': 'section2'})

    description = []
    description_raw = page_description.find_all('p')

    for d in description_raw:
        description_p = d.text
        description.append(description_p)

    page_bottom = hagane.find('section', {'id': 'section7'})
    details = page_bottom.find_all('li')

    name = None
    series = None
    manufacturer = None
    category = None
    price = None
    release_date = None
    sculptor = None

    for d in details:
        detail_text = d.text
        if 'Series Name: ' in detail_text:
            name = detail_text.replace('Series Name: ', '')
        elif 'Release Date: ' in detail_text:
            release_date = detail_text.replace('Release Date: ', '')
        elif 'Price: ' in detail_text:
            price = detail_text.replace('Price: ', '')
        elif 'Sculptor: ' in detail_text:
            sculptor = detail_text.replace('Sculptor: ', '')
        elif 'Painted' in detail_text:
            category = detail_text

    series = 'ZOIDS'
    manufacturer = 'Good Smile Company'
    copy = '© TOMY ZOIDS is a trademark of TOMY Company,Ltd.and used under license'

    product = {}
    
    #product['url'] = url
    #product['id'] = id
    #product['thumbnail'] = thumbnail
    #product['num'] = num
    product['subtitle'] = subtitle
    product['description'] = description
    #product['features'] = features
    product['images'] = images
    product['name'] = name
    product['series'] = series
    product['manufacturer'] = manufacturer
    product['category'] = category
    product['price'] = price
    product['release_date'] = release_date
    product['sculptor'] = sculptor
    product['copyright'] = copy
    #product['adult-content'] = adult_content

    print(json.dumps(product))

if __name__ == "__main__":
    main()