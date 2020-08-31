var addexp=document.getElementById('addexp');
var addqual=document.getElementById('addqual');
var extraqual=document.getElementById('qual_extra')

addexp.addEventListener('click',()=>{

    let name_of_org=document.getElementById('NOO');
    let DOJ=document.getElementById('DOJ');
    let DOR=document.getElementById('DOR');
    let exp_file=document.getElementById('exp_file')
    let str="view";
    let file=str.link(final_marksheet.value);
    
    console.log(name_of_org.value=="");

    if(name_of_org.value!="" && DOJ.value!="" && DOR.value!="" && exp_file.value!=""){
        let exp_table=document.getElementById('exp-table');
        let row=exp_table.insertRow(-1);
        let srno=row.insertCell(0);
        let noo=row.insertCell(1);
        let doj=row.insertCell(2);
        let dor=row.insertCell(3);
        let expfile=row.insertCell(4);
        row.insertCell(5).innerHTML="";

        srno.innerHTML=1;
        noo.innerHTML=name_of_org.value;
        doj.innerHTML=DOJ.value;
        dor.innerHTML=DOR.value;
        expfile.innerHTML=file;

        name_of_org.value=null;
        DOJ.value=null;
        DOR.value=null;
        expfile.value=null;
    }
})

addqual.addEventListener('click',()=>{
    let name_of_college=document.getElementById('NOC');
    let DOJ_college=document.getElementById('DOJ_college');
    let DOR_college=document.getElementById('DOL_college');
    let final_marksheet=document.getElementById('final_marksheet')

    if(name_of_college.value!="" && DOJ_college.value!="" && DOR_college.value!="" && final_marksheet.value!=""){
    
    let acadqual_table=document.getElementById('acadqual-table');
    let row=acadqual_table.insertRow(-1);
    let str="view";
    let file=str.link(final_marksheet.value);
    row.insertCell(0).innerHTML=1;
    row.insertCell(1).innerHTML=name_of_college.value;
    row.insertCell(2).innerHTML=DOJ_college.value;
    row.insertCell(3).innerHTML=DOR_college.value;
    row.insertCell(4).innerHTML=file;
    row.insertCell(5).innerHTML="";

    name_of_college.value=null;
    DOJ_college.value=null;
    DOR_college.value=null;
    final_marksheet.value=null;
    }
})


extraqual.addEventListener('click',()=>{
    
    let NOO_extra=document.getElementById('NOO_extra');
    let DOJ_extra=document.getElementById('DOJ_extra');
    let DOR_extra=document.getElementById('DOL_extra');
    let qual_extra_file=document.getElementById('qual_extra_file')

    if(NOO_extra.value!="" && DOJ_extra.value!="" && DOR_extra.value!="" && qual_extra_file.value!=""){

    let str="view";
    let file=str.link(final_marksheet.value);

    let extraqual_table=document.getElementById('extra-table');
    let row=extraqual_table.insertRow(-1);

    row.insertCell(0).innerHTML=1;
    row.insertCell(1).innerHTML=NOO_extra.value;
    row.insertCell(2).innerHTML=DOJ_extra.value;
    row.insertCell(3).innerHTML=DOR_extra.value;
    row.insertCell(4).innerHTML=file;
    row.insertCell(5).innerHTML="";

    NOO_extra.value=null;
    DOJ_extra.value=null;
    DOR_extra.value=null;
    qual_extra_file.value=null;
    }

})