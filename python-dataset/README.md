#Randomly generated dataset for currency prediction

1. Calculating features based on estinated data. Following features are being calculated.
2. Refer this link for the features and their explanation.
	http://www.compareremit.com/money-transfer-guide/key-factors-affecting-currency-exchange-rates/
3. So the features are :
	1. Inflation Rates
 	2. Interest Rates
	3. Country’s Current Account / Balance of Payments
	4. Government Debt
	5. Terms of Trade
	Not incorporating following features
	-- 6. Political Stability & Performance
	-- 7. Recession
	-- 8. Speculation
4. Using currency_data.csv. The format file is  : 
	> 1 greatbritain pound = switzerland, hongkong, india, usa, euro
	Note that the data depicts daily rates from 2009
5. Creating functions that depic the relation between the currency and features to create random dataset.

## Inflation rates
Lower the inflation rate higher the value of currency (closer to great britain)
#### India
Some data available here - http://www.inflation.eu/inflation-rates/india/historic-inflation/cpi-inflation-india.aspx
Unit of measurement - percentage (can be negative also)

- Inflation increases, value of currency decreases, conversion rate increase (farther to britain)
- Interest rates increases, appreciation since more profits, hence value goes nearer to britain)
- Current account balance is more than appreciation and so value goes nearer to great britain
- debt increases, depreciation, value goes farther from great britain
- terms of trade increases, appreciation, hence value nearer to britain
