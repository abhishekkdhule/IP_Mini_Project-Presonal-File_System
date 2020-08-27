window.onload =()=>{
    // Restrict the upload of files 
    file_inputs = document.querySelectorAll('[type="file"]')
    let is_hod = document.getElementById('hod')
    let is_curr_assoc = document.getElementById('curr_assoc')
    let received_phd = document.getElementById('received_phd')

    is_hod.onchange =()=>{
        document.getElementById('hod_doc').disabled = !document.getElementById('hod_doc').disabled
        document.getElementById('hod_doc').required = !document.getElementById('hod_doc').required
    }
    is_curr_assoc.onchange =()=>{
        document.getElementById('curr_assoc_doc').disabled = !document.getElementById('curr_assoc_doc').disabled
        document.getElementById('curr_assoc_doc').required = !document.getElementById('curr_assoc_doc').required
    }
    received_phd.onchange =()=>{
        document.getElementById('phd_doc').disabled = !document.getElementById('phd_doc').disabled
        document.getElementById('phd_doc').required = !document.getElementById('phd_doc').required
    }

    //ADD Delete Operations
    let table = document.getElementById('paper_table')
    let title = document.getElementById('title')
    let name_of_journal = document.getElementById('name_of_journal')
    let impact_factor = document.getElementById('impact_factor')
    let paper = document.getElementById('paper')
    let add_row = document.getElementById('add_row')
    let srno=0
    add_row.onclick=()=>{
        console.log(title.value,name_of_journal.value,impact_factor.value,paper.value)
        console.log()
        row = table.insertRow()
        row.innerHTML = `<td>${++srno}</td>
                        <td>${title.value}</td>
                        <td>${name_of_journal.value}</td>   
                        <td>${impact_factor.value}</td>
                        <td><a href="${URL.createObjectURL(paper.files[0])}">${paper.value.split('\\')[2]}</a></td>`
        row.onm                        
    }






}