import { useState } from 'react'
import axios from 'axios';

function FileUploader() {

    const [excelFile, setExcelFile] = useState('');
    // const [typeError, setTypeError] = useState('');
    
    // const [excelData, setExcelData] = useState('');

    const handleFile = (e)=>{
        const selectedFile = e.target.files[0];
        if(selectedFile)
        {
            setExcelFile(selectedFile);
            
        }
        else
        {
            console.log('select the file');
        }
    }

    const handleFormSubmit = (e)=>{
        e.preventDefault();

        const data = new FormData();
        data.append('employee_attendance', excelFile);

        submitForm(data);
    }

   async function submitForm(data:object) 
   {
        const url = 'http://127.0.0.1:8000/api/store';
        await axios.post(url, data).then((response)=>{
            console.log('response',response);
        });   
   }
    return (
        <>
            <form onSubmit={handleFormSubmit} encType='multipart/form-data'>
                <div className='row mt-5'>
                    <h5>Upload Excel File</h5>
                    <div className='col-md-8'>
                        <input type="file" className='form-control' required onChange={handleFile} />
                    </div>
                    <div className='col-md-2'>
                        <button type='submit' className='btn btn-success'>Submit</button>
                    </div>
                </div>
            </form>      
        </>
    )
}

export default FileUploader
