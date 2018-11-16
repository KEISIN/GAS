function doPost(e) {
  var shapp=SpreadsheetApp.openById("SheetID");
  var sh=shapp.getSheetByName("シート1");
  var tm=new Date();
  var ar=new Array();
  for(var i in e.parameter){
    ar.push(e.parameter[i]);
  }
  ar.push(tm);
  sh.appendRow(ar.reverse());
  MailApp.sendEmail("yourmail",e.parameter.name+"から回答がありました","回答者="+e.parameter.name+" : フォームを確認");
  return ContentService.createTextOutput("回答を受付けました");
}

