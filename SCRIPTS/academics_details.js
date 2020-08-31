
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
    // Selected File Name
    file_labels = document.querySelectorAll('.file_label')
    file_labels.forEach(file_label => {
        file_name = document.createElement('span')
        file_label.insertAdjacentElement("afterend",file_name)
        file_label.addEventListener('click',()=>{
            file =  document.getElementById(file_label.getAttribute('for'))
            file.onchange=()=>{
            if (!file.disabled){
                file_label.nextElementSibling.innerHTML =`<a target="_blank" href="${URL.createObjectURL(file.files[0])}">${file.files[0].name}</a>`
            }
        }
        })

    });
    //ADD Delete Operations
    let table = document.getElementById('paper_table')
    let title = document.getElementById('title')
    let name_of_journal = document.getElementById('name_of_journal')
    let impact_factor = document.getElementById('impact_factor')
    let paper = document.getElementById('paper')
    let add_row = document.getElementById('add_row')
  
    let data=[]
    let paper_files=[]
    add_row.onclick=()=>{
        console.log(title.value,name_of_journal.value,impact_factor.value,paper.value)
        row = table.insertRow()
        data.push({'title':title.value,
                    'name_of_journal':name_of_journal.value,
                    'impact_factor':impact_factor.value,
                    'paper_name':paper.value.split('\\')[2]
                    })

        paper_files.push(paper.files[0])


        row.setAttribute('class','paper_data')
        row.innerHTML = `<td>${data.length}</td>
                        <td>${title.value}</td>
                        <td>${name_of_journal.value}</td>   
                        <td>${impact_factor.value}</td>
                        <td><a target="_blank" href="${URL.createObjectURL(paper.files[0])}">${paper.value.split('\\')[2]}</a></td>
                        <td onclick="delete_row(${data.length-1})" class="delete_btn"><i class="fas fa-trash"></i></td>`
        title.value = name_of_journal.value = impact_factor.value = paper.value ='';
        document.querySelector('[for="paper"]').nextElementSibling.innerHTML ="";
        // console.log(paper_files)
        
                            
    }    
    function show(){
        table.innerHTML=''
        for(let item =0; item < data.length; item++){
            row = table.insertRow()
            row.setAttribute('class','paper_data')
            row.innerHTML = `<td>${item+1}</td>
            <td>${data[item].title}</td>
            <td>${data[item].name_of_journal}</td>   
            <td>${data[item].impact_factor}</td>
            <td><a target="_blank" href="${URL.createObjectURL(paper_files[item])}">${data[item].paper_name}</a></td>
            <td onclick="delete_row(${item})" class="delete_btn"><i class="fas fa-trash"></i></td>`            
        }
        
        
    }
    function delete_row(item){
        // if(confirm("Do you want to delete?")){
            
            data.splice(item,1)
            paper_files.splice(item,1)
            show()
            console.log(data)
        // }

    }  
    // Submit Data
    form = document.getElementById('form')
    document.getElementById('submit').onclick=()=>{
        let formdata = new FormData(form)
        formdata.append('data',JSON.stringify(data))

        for (let i = 0; i < paper_files.length; i++) {
            formdata.append('paper'+i,paper_files[i],paper_files[i].name);
            
        }
        console.log(paper_files)
        let xmlhttp = new XMLHttpRequest()
        xmlhttp.onreadystatechange = ()=>{
            console.log(xmlhttp.status,xmlhttp.readyState)
            if(xmlhttp.status==200 && xmlhttp.readyState==4){
                document.getElementById('info').innerHTML=xmlhttp.responseText
            }
        }
        xmlhttp.open("post","../PHP/get_academic_details.php")

        xmlhttp.send(formdata)

        

        
    }






