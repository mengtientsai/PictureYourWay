# 圖窮景獻 Picture Your Way
#### Building a picture based attraction recommendation system by combing LDA and K-Means in the structure of Scatter/Gather
#### Scatter/Gather結合LDA與K-Means建構圖片景點推薦系統
[Webpage](http://35.201.182.2/main/index_b.php) | [3-minute demo/introduction](https://www.youtube.com/watch?v=Hjomt424dHA&feature=youtu.be)
### Abstract
The main purpose of this Picture Your Way is to build a picture-based attraction recommendation system. The proposed algorithm combines Latent Dirichlet Allocation (LDA) and K-Means in the structure of Scatter/Gather. Through this system, thousands of tourist attractions in Taiwan are recommended to users via a direct and prompt process, selecting pictures.
We leveraged the information of attractions listed in the governement open tourist attraction data and selected corresponding pictures from Instagram. The pictures ranked by Elo Rating System is moderately correlated to the realistic public preferences. The accuracy of LDA topics is 66%. The precision value for this proposed algorithm is 74%. And the system effectiveness calculated through the feedback of users is PR 72. Therefore, this system is proven to succeed in recommending suitable and beautiful attractions in Taiwan to users by using the proposed algorithm in this study.
* **Data Resource:** [Taiwan Open Government Data - Tourist Attraction Database](https://data.gov.tw/dataset/7777) (under the [Open Government Data License ](https://data.gov.tw/license#eng)), [Instagram](https://www.instagram.com/).
* **Methods:** Latent Dirichlet Allocation (LDA) Topic Modeling, K-means Clustering Algorithm, Elo Rating Algorithm, Natural Language Processing (NLP), PHP Web Development.
* **Experimental Design:** Spearman Correlation, Confussion Matrix (F-measure).
### Features
* **Instant Demonstration:** Distinguish attraction type through browsing pictures without reading long discriptions.
* **Convenience:** Reduce massive search time for users.
* **Accuracy:** Achieve optimal clustering and recommendation through machine learning algorithm training and careful evaluation.
* **Aesthetic:** Weight used pictures from the rankings aligned with public preferences to better meet user's need.
### Core Methods
* [Scatter/Gather](https://sigir.org/wp-content/uploads/2017/06/p148.pdf): A document clustering algorithm used to cluster massive documents within a short period of time, which allowed us to provide the optimal tourist attractions to users effectively.
* [LDA Topic Modeling](https://web.archive.org/web/20120207011313/http://jmlr.csail.mit.edu/papers/volume3/blei03a/blei03a.pdf): A machine learning algorithm used to extract latent topics from text data, which was leveraged in our first "Scatter" in the Scatter/Gather structure. (Unlike TF-IDF, LDA considers the term distributions in addition to term frequencies).
* [K-means Clustering](https://projecteuclid.org/download/pdf_1/euclid.bsmsp/1200512992): A unsupervised learning algorithm that provides instant clustering in this system. Under evaluation, it was proven feasible to extract the topic distribution from LDA for each tourist spot as the attributes in euclidean distance calcuation in K-means. This replaces the tradition sparse term-document matrix and reduces the time and space cost.
* [Elo Rating System](https://en.wikipedia.org/wiki/Elo_rating_system): A picture ranking algorithm inspired by the film, The Social Network (2010). Considering aesthetic as an important factor in picture selection, we trained the pictures using elo-rating algorithm to assign rankings and integrate in our system as the one of the demonstration basis.
### Techniques
Areas           | Techniques  |
--------------|:-----|
Analytics| [Python](https://www.python.org/)|
Front-end| Javascript, CSS, HTML|
Back-end  | [PHP](https://www.php.net/docs.php) |
Database|[MySQL](https://www.mysql.com/)|
Cloud Service|[Google Cloud Platform](https://cloud.google.com/gcp/getting-started?hl=zh-tw)|

****

# Abstract
圖窮景獻 Picture Your Way是以圖片呈現的景點推薦系統。使用者不需輸入個人資訊，僅須點選圖片，系統便能依據使用者偏好快速推薦景點。
* 資料來源: 政府開放資料平台「景點-觀光資訊資料庫」所提供之3987筆台灣景點配合相對應的Instagram圖片。
* 運用演算法: Latent Dirichlet Allocation (LDA)、K-Means Clustering、Elo Rating System。
* 實驗設計: Spearman相關、F-Measure。
<div align=center><img width="200" height="350" src="https://github.com/mengtientsai/PictureYourWay/blob/master/readme_pic/process.png"/></div>

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
Analytics| [Python](https://www.python.org/)|
Front-end| Javascript, Css, Html|
Back-end  | [PHP](https://www.php.net/docs.php) |
Database|[MySQL](https://www.mysql.com/)|
Cloud Service|[Google Cloud Platform](https://cloud.google.com/gcp/getting-started?hl=zh-tw)|

