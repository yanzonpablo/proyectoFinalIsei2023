
    
// <a id="download_xls" download="filename.xls" href="#">Export to Excel</a>
let download_xls = document.querySelector("#download_xls")
download_xls.addEventListener("click", ()=>{                     
    ExcellentExport.excel(download_xls, 'datatable')
});

// colocar a <table id="datatable">

// <a id="download_csv" download="filename.csv" href="#">Export to CSV</a>

// let download_csv = document.querySelector("#download_csv")
// download_csv.addEventListener("click", ()=>{                     
// ExcellentExport.csv(download_csv, 'datatable');
// })

// <a id="download_xlsx" href="#">Export to CSV</a>
// let download_xlsx = document.querySelector("#download_xlsx")
// download_xlsx.addEventListener("click", ()=>{                     
//     ExcellentExport.convert({ anchor: download_xlsx, filename: 'filename', format: 'xlsx'},[{name: 'Sheet Name Here 1', from: {table: 'datatable'}}])
// })