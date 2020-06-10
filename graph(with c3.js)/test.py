r = open('text.text', mode='rt', encoding='utf-8')

aCountry = list(r.readlines())

for i in aCountry:
    aList = list(i.split('\t'))
    print(aList[0: 2])