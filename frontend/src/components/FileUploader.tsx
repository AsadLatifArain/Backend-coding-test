import { useState } from 'react'
import axios from 'axios';

function FileUploader() {

    const [excelFile, setExcelFile] = useState('');
    const [typeError, setTypeError] = useState(false);
    const [resMessage, setResMessage] = useState('');
    const [btnInfo, setBtnInfo] = useState({isDisable:false, name:'Upload'});
    
    // const [excelData, setExcelData] = useState('');

    const handleFile = (e)=>{
        const selectedFile = e.target.files[0];
        if(selectedFile)
        {
            setExcelFile(selectedFile);
            
        }
        else
        {
            alert('select the file');
        }
    }

    const handleFormSubmit = (e)=>{
        e.preventDefault();

        const data = new FormData();
        data.append('employee_attendance', excelFile);
        console.log(excelFile);
        submitForm(data);
    }

   async function submitForm(data:object) 
   {
        const url = 'http://127.0.0.1:8000/api/store';
        setBtnInfo({isDisable: true, name: 'Please wait...'});
        await axios.post(url, data).then((response)=>{
            
            setBtnInfo({isDisable: false, name: 'Upload'});
            const res = response.data;


            if(res.status === true)
            {
                setTypeError(false);
                setResMessage(res.message);
            }
            else
            {
                setTypeError(true);
                setResMessage(res.message);
            }
        });   
   }
    return (
        <>
            <div className="card mt-5">
                <div className='card-body'>
                    <form onSubmit={handleFormSubmit} encType='multipart/form-data'>
                        <div className='row'>
                            <h5>Upload Excel File</h5>
                            <div className='col-md-8'>
                                <input type="file" className='form-control' required onChange={handleFile} />
                            </div>
                            <div className='col-md-2'>
                                <button type='submit' disabled={btnInfo.isDisable}  className='btn btn-success '>{btnInfo.name}</button>
                            </div>

                            {typeError?(
                                <div className=' col-md-12 text-danger'>{resMessage}</div>
                            ):(            
                                <div className=' col-md-12 text-success'>{resMessage}</div>
                            )}

                        </div>
                    </form>
                </div> 
            </div>      
        </>
    )
}

export default FileUploader
