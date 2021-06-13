function cal() {
    
    var beforecal = document.getElementById("hidden_price").value;
    beforecal = parseFloat(beforecal,10);
    var aftercal;
    var tran = document.getElementsByName("tran");
   
    //คำนวณราคาตามการเลือกการขนส่ง
    if (tran[0].checked) {
        aftercal = beforecal + 30 ;
    }
    else if (tran[1].checked){
        aftercal = beforecal + 50 ;
    }
    else if (tran[2].checked){
        aftercal = beforecal + 60 ;
    }

    document.getElementById("pricecal").value = aftercal;
}