UUSETEXTLINKS = 1
foldersTree = gFld("<a href=http://gjun.tw target=_blank>陳老師網路學院</a>", "")

aux1 = insFld(foldersTree, gFld("基本認識", "000.htm"))
  insDoc(aux1, gLnk(0,"主題設定", "class/001.htm"))
  insDoc(aux1, gLnk(0,"網站建立", "class/002.htm"))
  insDoc(aux1, gLnk(0,"網站開啟", "class/003.htm"))
  insDoc(aux1, gLnk(0,"網站編輯", "class/004.htm"))
  insDoc(aux1, gLnk(0,"網站刪除", "class/005.htm"))
  insDoc(aux1, gLnk(0,"新增網頁", "class/006.htm"))

aux1 = insFld(foldersTree, gFld("基本操作", "100.htm"))
  insDoc(aux1, gLnk(0,"文字編輯", "class/101.htm"))
  insDoc(aux1, gLnk(0,"加入圖片", "class/102.htm"))
  insDoc(aux1, gLnk(0,"加超連結", "class/103.htm"))
  insDoc(aux1, gLnk(0,"加入表格", "class/104.htm"))
  insDoc(aux1, gLnk(0,"使用架框", "class/105.htm"))
  insDoc(aux1, gLnk(0,"加入元件", "class/106.htm"))
  insDoc(aux1, gLnk(0,"動態網頁", "class/107.htm"))
  insDoc(aux1, gLnk(0,"特殊效果", "class/108.htm"))

aux1 = insFld(foldersTree, gFld("進階編輯", "200.htm"))
  insDoc(aux1, gLnk(0,"樹枝目錄", "class/201.htm"))
  insDoc(aux1, gLnk(0,"捲動公告", "class/202.htm"))
  insDoc(aux1, gLnk(0,"教學列表", "class/203.htm"))
  insDoc(aux1, gLnk(0,"教學列表", "class/204.htm"))
  insDoc(aux1, gLnk(0,"教學列表", "class/205.htm"))

insDoc(foldersTree, gLnk(0,"回到首頁", "index.html"))