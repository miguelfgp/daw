import requests
from bs4 import BeautifulSoup
import json
import re
import time

def main():
    year = 2021
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

    while year < 2023:
        print(year)
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

            num = None
            num_raw = p.find('span', {'class': 'hitNum'})
            
            if num_raw:
                num = num_raw.text

            print(num)

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
            actmodel = product_data.find('div', {'id': 'actmode_bg'})
            dai = product_data.find('div', {'id': 'figma_dai_cnt'})
            miku5 = product_data.find('div', {'id': 'nendoroid_miku_symphony'})
            heroacademy = product_data.find('div', {'id': 'moderoid_heroaca'})

            if hagane or actmodel or dai or miku5 or heroacademy:
                product_base = {}

                product_base['url'] = url
                product_base['id'] = id
                product_base['thumbnail'] = thumbnail
                product_base['num'] = num

                if hagane:
                    print('HAGANE PRODUCT!!!')
                    hagane = hagane_scraper(url)
                    hagane_product = product_base | hagane

                    product_list.append(hagane_product)
                    time.sleep(3)
                    continue
                elif actmodel:
                    print('ACTMODEL PRODUCT!!!')
                    actmode = actmode_scraper(url)
                    actmode_product = product_base | actmode

                    product_list.append(actmode_product)
                    print(actmode_product)
                    time.sleep(3)
                    continue
                elif dai:
                    print('DAI PRODUCT!!!')
                    dai = dai_scraper(url)
                    dai_product = product_base | dai

                    product_list.append(dai_product)
                    print(dai_product)
                    time.sleep(3)
                    continue
                elif miku5:
                    print('MIKU SYMPHONY 5 PRODUCT!!!')
                    miku5 = miku5_scraper(url)
                    miku5_product = product_base | miku5

                    product_list.append(miku5_product)
                    print(miku5_product)
                    time.sleep(3)
                    continue
                elif heroacademy:
                    print('HERO ACADEMY PRODUCT!!!')
                    heroacademy = heroacademy_scraper(url)
                    heroacademy_product = product_base | heroacademy

                    product_list.append(heroacademy_product)
                    print(heroacademy_product)
                    time.sleep(3)
                    continue

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

            bonus = None
            bonus_image = None
            bonus_content = product_data.find('div', {'class': 'gscbonusimage'})

            if bonus_content:
                bonus_raw = bonus_content.find('h2')
                if bonus_raw:
                    bonus = bonus_raw.text
                else:
                    bonus_raw = bonus_content.find_all('span')
                    if len(bonus_raw) > 1:
                        bonus = bonus_raw.text
                bonus_image_raw = bonus_content.find('img')
                if bonus_image_raw:
                    bonus_image = bonus_image_raw.get('src')

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
            product['bonus'] = bonus
            product['bonus_image'] = bonus_image

            product_list.append(product)
            time.sleep(3)
            
        year += 1
        with open('goodsmile.json', 'w') as outfile:
            json.dump(product_list, outfile)

        outfile.close()

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
        subtitle = string_cleaner(subtitle_raw.text)

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
            name = string_cleaner(detail_text.replace('Series Name: ', ''))
        elif 'Release Date: ' in detail_text:
            release_date = string_cleaner(detail_text.replace('Release Date: ', ''))
        elif 'Price: ' in detail_text:
            price = string_cleaner(detail_text.replace('Price: ', ''))
        elif 'Sculptor: ' in detail_text:
            sculptor = string_cleaner(detail_text.replace('Sculptor: ', ''))
        elif 'Painted' in detail_text:
            category = string_cleaner(detail_text)

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
    product['adult-content'] = False
    product['bonus'] = None
    product['bonus_image'] = None

    return product

def actmode_scraper(url):

    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')
    actmode = soup.find('div', {'id': 'actmode_bg'})

    images = []
    images_list = []

    img_top = actmode.find('img', {'class': 'pc'})
    img_center = actmode.find('img', {'class': 'img'})
    img_bot = actmode.find('img', {'class': 'img_spec'})

    if (img_top):
        images_list.append(img_top)

    if (img_center):
        images_list.append(img_center)

    if (img_bot):
        images_list.append(img_bot)

    img_carrousel = actmode.find_all('a', {'class', 'imagebox'})

    for i in img_carrousel:
        image = i.get('href')
        if image not in images:
            images.append(image)

    img_slider_container = actmode.find('ul', {'class', 'slider'})
    img_slider = img_slider_container.find_all('img')

    for ic in img_slider:
        images_list.append(ic)

    for i in images_list:
        image = i.get('src')
        if image not in images:
            images.append(image)

    subtitle = None
    description = None

    description_content = actmode.find('div', {'class', 'text'})

    subtitle_raw = description_content.find('h3')

    if subtitle_raw:
        subtitle = string_cleaner(subtitle_raw.text)

    description_raw = description_content.find('p')

    if description_raw:
        description = string_cleaner(description_raw.text)

    details = actmode.find_all('div', {'class', 'line'})

    manufacturer = 'Good Smile Company'
    category = 'ACT MODE'
    name = None
    series = None
    release_date = None
    price = None
    sculptor = None

    for d in details:
        detail_title = None
        detail_text = None

        detail_title_raw = d.find('div', {'class', 'ttl'})

        if detail_title_raw:
            detail_title = string_cleaner(detail_title_raw.text)

        detail_text_raw = d.find('div', {'class', 'detail'})

        if detail_text_raw:
            detail_text = string_cleaner(detail_text_raw.text)
        
        if detail_title == 'Product Name':
            name = detail_text
        elif detail_title == 'Series Name':
            series = detail_text
        elif detail_title == 'Release Date':
            release_date = detail_text
        elif detail_title == 'Price':
            price = detail_text
        elif detail_title == 'Sculptor':
            sculptor = detail_text

    copy_container = soup.find('div', {'id': 'footer'})
    copy = copy_container.find('p').text

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
    product['adult-content'] = False
    product['bonus'] = None
    product['bonus_image'] = None

    return product

def dai_scraper(url):
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')
    dai = soup.find('div', {'id': 'figma_dai_cnt'})

    images = []
    images_list = []

    bg_img = dai.find_all('img', {'class': 'img'})

    for i in bg_img:
        images_list.append(i)

    img_slider_container = dai.find('ul', {'class', 'slider'})
    img_slider = img_slider_container.find_all('img')

    for ic in img_slider:
        images_list.append(ic)

    for i in images_list:
        image = i.get('src')
        if image not in images:
            images.append(image)

    subtitle = None
    features = []

    features_content = dai.find('div', {'class', 'txt'})

    subtitle_raw = features_content.find('p')

    if subtitle_raw:
        subtitle = string_cleaner(subtitle_raw.text)

    features_raw = features_content.find_all('li')

    for f in features_raw:
        feature = string_cleaner(f.text)
        features.append(feature)

    details = dai.find_all('div', {'class', 'line'})

    manufacturer = None
    category = 'figma'
    name = None
    series = None
    release_date = None
    price = None
    sculptor = 'Shinji Koshinuma'

    for d in details:
        detail_title = None
        detail_text = None

        detail_title_raw = d.find('div', {'class', 'ttl'})

        if detail_title_raw:
            detail_title = string_cleaner(detail_title_raw.text)

        detail_text_raw = d.find('div', {'class', 'detail'})

        if detail_text_raw:
            detail_text = string_cleaner(detail_text_raw.text)
        
        if detail_title == 'Product Name':
            name = detail_text
        elif detail_title == 'Series Name':
            series = detail_text
        elif detail_title == 'Release Date':
            release_date = detail_text
        elif detail_title == 'Price':
            price = detail_text
        elif detail_title == 'Released by':
            manufacturer = detail_text

    copy_container = soup.find('div', {'id': 'footer'})
    copy = copy_container.find('p').text

    bonus_image = None
    bonus_image_raw = dai.find('img', {'class': 'img_online'})
    if bonus_image_raw:
        bonus_image = bonus_image_raw.get('src')

    product = {}

    product['subtitle'] = subtitle
    product['description'] = None
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
    product['adult-content'] = False
    product['bonus'] = 'Papunika Knife'
    product['bonus_image'] = None

    return product

def miku5_scraper(url):
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')
    miku = soup.find('div', {'id': 'nendoroid_miku_symphony'})

    images = []
    images_list = []
    link_list = []

    main_img = miku.find('img', {'class': 'anime_white'})
    if main_img:
        images_list.append(main_img)

    img_list = miku.find_all('li')
    bonus_image = None

    for l in img_list:
        link = l.find('a')
        if link:
            link_list.append(link)
        elif l.find('p'):
            bonus_img_raw = l.find('img')
            bonus_image = bonus_img_raw.get('src')
        else:
            img = l.find('img')
            if img:
                images_list.append(img)


    for i in images_list:
        image = i.get('src')
        if image not in images:
            images.append(image)

    for l in link_list:
        image = l.get('href')
        if image not in images:
            images.append(image)

    bot_img_raw = miku.find('div', {'class': 'spec_miku'})
    bot_img = bot_img_raw.find('img')
    if bot_img_raw:
        images.append(bot_img.get('src'))

    subtitle = None
    description = None

    subtitle_raw = miku.find('h3')
    if subtitle_raw:
        subtitle = string_cleaner(subtitle_raw.text)

    description_container = miku.find('div', {'class': 'inner'})
    description_raw = description_container.find('p')
    if description_raw:
        description = string_cleaner(description_raw.text)

    details = miku.find_all('div', {'class', 'line'})

    manufacturer = None
    category = 'Nendoroid'
    name = None
    series = None
    release_date = None
    price = None
    sculptor = None

    for d in details:
        detail_title = None
        detail_text = None

        detail_title_raw = d.find('div', {'class', 'ttl'})

        if detail_title_raw:
            detail_title = detail_title_raw.text

        detail_text_raw = d.find('div', {'class', 'detail'})

        if detail_text_raw:
            detail_text = detail_text_raw.text
        
        if detail_title == 'Product Name':
            name = detail_text
        elif detail_title == 'Series Name':
            series = detail_text
        elif detail_title == 'Release Date':
            release_date = detail_text
        elif detail_title == 'Price':
            price = detail_text
        elif detail_title == 'Sculptor':
            sculptor = detail_text  
        elif detail_title == 'Released / Distributed':
            manufacturer = detail_text    

    copy_container = soup.find('div', {'id': 'footer'})
    copy = copy_container.find('p').text

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
    product['adult-content'] = False
    product['bonus'] = 'Special Round Base'
    product['bonus_image'] = bonus_image

    return product

def heroacademy_scraper(url):
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'lxml')

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
    product['adult-content'] = False
    product['bonus'] = 'Special Round Base'
    product['bonus_image'] = bonus_image

    return product

if __name__ == "__main__":
    main()