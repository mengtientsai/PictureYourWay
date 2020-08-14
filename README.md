# About PictureYourWay
**圖窮景獻 Picture Your Way
-Scatter/Gather結合LDA與K-Means建構圖片景點推薦系統**

圖窮景獻 Picture Your Way是以圖片呈現的景點推薦系統。使用者不需輸入個人資訊，僅須點選圖片，便能快速獲得推薦的理想景點。
* 資料來源: 政府開放資料平台「景點-觀光資訊資料庫」所提供之3987筆台灣景點配合相對應的Instagram圖片。
* 運用演算法: Latent Dirichlet Allocation (LDA)、K-Means Clustering、Elo Rating System。
* 實驗設計: Spearman相關、F-Measure。
<center>

![image](https://github.com/mengtientsai/PictureYourWay/blob/master/readme_pic/process.png)

</center>

# Feature
* 直觀呈現: 不須閱讀大量文字，藉由圖片，肉眼便可直接分辨景點類型進行選擇。
* 方便性: 大幅減少使用者尋找景點的時間。
* 準確性: 透過機器學習演算法不斷訓練做最佳分群，經由嚴謹驗證，具準確性。
* 美觀性考量: 賦予圖片排名數據，呈現社會大眾普遍認為較美觀的景點，以更符合使用者需求。

# Core
* [Scatter/Gather](https://sigir.org/wp-content/uploads/2017/06/p148.pdf): 能快速收斂縮減資料筆數，有效的找到使用者理想的景點類型。
* [LDA主題模型分析](https://web.archive.org/web/20120207011313/http://jmlr.csail.mit.edu/papers/volume3/blei03a/blei03a.pdf): 為Scatter/Gather第一層預先建模的分群。其模型與TF-IDF的差別在於其分群依據不只考慮詞頻，亦考慮了詞與詞之間的相對分布。
* [K-Means分群法](https://projecteuclid.org/download/pdf_1/euclid.bsmsp/1200512992): 為即時的分群，本研究透過統計方法驗證後，以萃取各景點的LDA主題機率分布作為K-Means分群中計算歐式距離的變數，以取代過往文件分群使用的稀疏矩陣解決線上即時大量數據計算耗時的問題。
* [Elo Rating System](https://en.wikipedia.org/wiki/Elo_rating_system): 考量景點美觀為使用者挑選景點的重要因素，以Elo Rating System 訓練所有圖片後，讓圖片擁有能代表其美觀程度之數值，融入本研究系統呈現的依據。

# Techniques

領域           | 技術  |
--------------|:-----|
Front-end| Javascript, Css, Html|
Back-end  | [PHP](https://www.php.net/docs.php) |
Database|[MySQL](https://www.mysql.com/)|

