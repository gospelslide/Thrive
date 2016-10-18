import csv
from collections import OrderedDict
from matplotlib import pyplot as mp
import numpy as np
import json

currencyFilePath = "data/currency_data.csv"


# reading currency file
# Data list contains list of all the dates
currency_data = []
with open(currencyFilePath, 'rb') as csvfile:
	spamreader = csv.reader(csvfile, delimiter=',')
	for row in spamreader:
		currency_data.append(row[1:])

# currency_data has data in format
# Order of conuntries -> switzerland, hongkong, india, usa, euro >>> Compared to 1 greatbritain pound
# currency_data[0] => Day1 -> [<currencies of all contries>]
# currency_data[2] => Day2 -> [<currencies of all contries>]
# currency_data[3] => Day3 -> [<currencies of all contries>]
# ..... so on.

# print currency_data

# segregating currencies
switzerland = []
hongkong = []
india = []
usa = []
euro = []

for i in currency_data:
	switzerland.append(i[0])
	hongkong.append(i[1])
	india.append(i[2])
	usa.append(i[3])
	euro.append(i[4])

# Now creating functions to populate data as per 8 parameters

# # For india
# paramIndia = OrderedDict()
# index = 0;
# for i in india:
# 	tempDict = {}
# 	tempDict['index'] = index
# 	tempDict['inflation'] = round((float(i)/10.0)-4,2)
# 	tempDict['interest_rates'] = round(1000.0/float(i)-2,2)
# 	tempDict['currency'] = i
# 	# current balance in million dollars
# 	tempDict['currentBalance'] = round(500000/float(i),2)
# 	tempDict['termsOfTrade'] = (10000.0/float(i))-(int(float(i)/10)**3)*0.07
# 	paramIndia[index] = tempDict
# 	index = index + 1

# # printing All the parameters of India
# # print paramIndia
# with open('data/indiaData.json', 'w') as fp:
#     json.dump(paramIndia, fp)

# # For switzerland
# paramSwis = OrderedDict()
# index = 0;
# for i in switzerland:
# 	tempDict = {}
# 	tempDict['index'] = index
# 	tempDict['inflation'] = round((float(i)*10.0)-2,2)
# 	tempDict['interest_rates'] = round(10/float(i)-5,2)
# 	tempDict['currency'] = i
# 	# current balance in million dollars
# 	tempDict['currentBalance'] = round(500000/float(i),2)
# 	tempDict['termsOfTrade'] = round(200.0/float(i)-40,2)
# 	paramSwis[index] = tempDict
# 	index = index + 1

# # printing All the parameters of India
# # print paramSwis
# with open('data/swisData.json', 'w') as fp:
#     json.dump(paramSwis, fp)

# # For HongKong
# paramHongKong = OrderedDict()
# index = 0;
# for i in hongkong:
# 	tempDict = {}
# 	tempDict['index'] = index
# 	tempDict['inflation'] = round((float(i))-7,2)
# 	tempDict['interest_rates'] = round(10/float(i),2)
# 	tempDict['currency'] = i
# 	# current balance in million dollars
# 	tempDict['currentBalance'] = round(500000/float(i),2)
# 	tempDict['termsOfTrade'] = round(1000.0/float(i),2)
# 	paramHongKong[index] = tempDict
# 	index = index + 1

# # printing All the parameters of India
# # print paramHongKong
# with open('data/HongKongData.json', 'w') as fp:
#     json.dump(paramHongKong, fp)

# # For usa
# paramUSA = OrderedDict()
# index = 0;
# for i in usa:
# 	tempDict = {}
# 	tempDict['index'] = index
# 	tempDict['inflation'] = round(float(i),2)
# 	tempDict['interest_rates'] = 0.5
# 	tempDict['currency'] = i
# 	# current balance in million dollars
# 	tempDict['currentBalance'] = round(100000/float(i)+20000,2)
# 	tempDict['termsOfTrade'] = 100/float(i)+20
# 	paramUSA[index] = tempDict
# 	index = index + 1

# # printing All the parameters of USA
# # print paramUSA
# with open('data/usaData.json', 'w') as fp:
#     json.dump(paramUSA, fp)

# For euro
paramEuro = OrderedDict()
index = 0;
for i in euro:
	tempDict = {}
	tempDict['index'] = index
	tempDict['inflation'] = round(float(i)-float(i)*4/10-0.30,2)
	tempDict['interest_rates'] = round(1/float(i),2)
	tempDict['currency'] = i
	# current balance in million dollars
	tempDict['currentBalance'] = round(100000/float(i)+20000,2)
	tempDict['termsOfTrade'] = round(20000/float(i)+10000,2)
	paramEuro[index] = tempDict
	index = index + 1

# printing All the parameters of Euro
# print paramEuro
with open('data/euroData.json', 'w') as fp:
    json.dump(paramEuro, fp)
