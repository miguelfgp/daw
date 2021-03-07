import requests
from bs4 import BeautifulSoup
import json
import re
import time

def main():
    year = 2020
    main_url = 'https://www.goodsmile.info/en/products/released/'
    cookie = {'age_verification_ok': 'true'}
    outfile = open('goodsmile.json')

    with open('goodsmile.json', 'r') as f:
        outfile = f.read()

    if outfile:
        product_list = json.loads(outfile)
    else:
        product_list = []

    id_list = []

    for p in product_list:
        id_list.append(p.get('id'))

    r_url = '%s%s' % (main_url, year)
    r = requests.get(r_url)
    soup = BeautifulSoup(r.text, 'lxml')

    products = soup.find_all('div', {'class': 'hitBox'})

    for p in products:
        
        adult_content = False
        url = p.find('a').get('href')
        id = re.findall(r'\d+', url)[0]

        print(id)

        if id in id_list:
            continue

        thumbnail = None
        thumbnail_raw = p.find('img').get('data-original')
        thumbnail = string_cleaner(thumbnail_raw)

        r = requests.get(url)
        soup = BeautifulSoup(r.text, 'lxml')

        product_data = soup.find('div', {'class': 'product-body'})

        if not product_data:
            adult_content = True
            r = requests.get(url, cookies=cookie)

            soup = BeautifulSoup(r.text, 'lxml')
            product_data = soup.find('div', {'class': 'product-body'})

        hagane = product_data.find('div', {'id': 'cnt_wrap_hagane_works'})

        if (hagane):
            print('HAGANE PRODUCT!!!')
            hagane_a = {}
            hagane_a['url'] = url
            hagane_a['id'] = id
            hagane_a['thumbnail'] = thumbnail
            hagane_a['num'] = None

            hagane_b = hagane_scraper(url)

            hagane_product = hagane_a | hagane_b
            hagane_product['adult-content'] = adult_content

            product_list.append(hagane_product)
            time.sleep(3)
            continue

        num = None
        num_raw = product_data.find('div', {'class': 'itemNum'})

        if num_raw:
            num = num_raw.text

        description_content = product_data.find('div', {'class': 'description'})

        subtitle = None
        subtitle_raw = description_content.find('h3')

        if subtitle_raw:
            subtitle = subtitle_raw.text

        description = []
        description_raw = description_content.find_all('p')

        for d in description_raw:
            description_p = string_cleaner(d.text)
            description.append(description_p)

        if len(description) == 1:
            description = description[0]

        if not description:
            description = None
        
        features = []
        features_raw = description_content.find_all('li')

        for f in features_raw:
            feature = string_cleaner(f.text)
            features.append(feature)

        if len(features) == 1:
            features = features[0]

        if not features:
            features = None

        images = []
        images_raw = product_data.find_all('img', {'class': 'itemImg'})

        if not images_raw:
            images_raw = product_data.find_all('img', {'class': 'goodsimage'})

        for i in images_raw:
            image_raw = i.get('src')
            image = string_cleaner(image_raw)
            images.append(image)

        if len(images) == 1:
            images = images[0]

        if not images:
            images = None
        
        details_content = product_data.find('div', {'class': 'detailBox'})

        name = None
        series = None
        manufacturer = None
        category = None
        price = None
        release_date = None
        sculptor = None

        if details_content:
        
            details = details_content.find_all('dt')

            for d in details:
                detail_title = string_cleaner(d.text)
                detail_text = string_cleaner(d.findNext('dd').text)

                if detail_text:
                    detail_text = string_cleaner(detail_text)

                if detail_title == 'Product Name':
                    name = detail_text
                elif detail_title == 'Series':
                    series = detail_text
                elif detail_title == 'Manufacturer':
                    manufacturer = detail_text
                elif detail_title == 'Category':
                    category = detail_text
                elif detail_title == 'Price':
                    price = detail_text
                elif detail_title == 'Release Date':
                    release_date = detail_text
                elif 'Sculp' in detail_title:
                    sculptor = detail_text
        else:
            name_raw = product_data.find('span', {'class': 'goodstitle'}).text
            name = string_cleaner(name_raw)
            series_content = product_data.find('div', {'class': 'goodsdescription'})
            series_raw = series_content.find(text=True, recursive=False)
            series = string_cleaner(series_raw)

            details = product_data.find_all('span', {'class': 'goodsspec'})

            for d in details:
                detail_title = string_cleaner(d.text)
                detail_text = string_cleaner(d.next_sibling)

                if detail_text:
                    detail_text = string_cleaner(detail_text)

                if detail_title == 'Specifications':
                    category = detail_text
                elif detail_title == 'Price':
                    price = detail_text
                elif detail_title == 'Release Date':
                    release_date = detail_text

        copy = None
        copyright_raw = product_data.find('div', {'class': 'itemCopy'})
        
        if copyright_raw:
            copy = copyright_raw.text
        else:
            copyright_raw = product_data.find('div', {'class': 'goodscopyright'}) 
            if copyright_raw:
                copy = copyright_raw.text
                copy = string_cleaner(copy)

        product = {}
        
        product['url'] = url
        product['id'] = id
        product['thumbnail'] = thumbnail
        product['num'] = num
        product['subtitle'] = subtitle
        product['description'] = description
        product['features'] = features
        product['images'] = images
        product['name'] = name
        product['series'] = series
        product['manufacturer'] = manufacturer
        product['category'] = category
        product['price'] = price
        product['release_date'] = release_date
        product['sculptor'] = sculptor
        product['copyright'] = copy
        product['adult-content'] = adult_content

        product_list.append(product)
        time.sleep(3)

    with open('goodsmile.json', 'w') as outfile:
        json.dump(product_list, outfile)

def string_cleaner(string):

    string = " ".join(string.split())
    string = string.replace('//', '')

    return(string)

def hagane_scraper(url):

    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')
    hagane = soup.find('div', {'id': 'cnt_wrap_hagane_works'})

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
        description_p = string_cleaner(d.text)
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
    
    product['subtitle'] = subtitle
    product['description'] = description
    product['features'] = None
    product['images'] = images
    product['name'] = name
    product['series'] = series
    product['manufacturer'] = manufacturer
    product['category'] = category
    product['price'] = price
    product['release_date'] = release_date
    product['sculptor'] = sculptor
    product['copyright'] = copy

    return product

if __name__ == "__main__":
    main()