import { useState } from 'react'
import axios from 'axios';

function ShowAttendanceList() {

    const [attendanceData, setAttendanceData] = useState([]);
    
    const handleShowAttendance = async () => {

        const url = 'http://127.0.0.1:8000/api/get_attendance';

        await axios.get(url).then((response)=>{
           const res = response.data;

           if(res.status === true)
           {
                setAttendanceData(res.data)
           }
           else
           {
                setAttendanceData([])
           }
        }); 
    }

    return (
        <>
            <div className="card mt-5">
                <div className='card-header'>
                    <button onClick={handleShowAttendance} className='btn btn-success btn-sm'> Show Attendance </button>
                </div>
                <div className='card-body'>
                   <div className='row'>
                        <div className='col-md-12'>
                            <table className='table table-striped table-bordered'>
                                <thead>
                                    <tr>
                                        <th style={{width:"40%"}}>NAME</th>
                                        <th style={{width:"20%"}}>CHECKIN</th>
                                        <th style={{width:"20%"}}>CHECKOUT</th>
                                        <th style={{width:"20%"}}>TOTAL WORKING HOURS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {attendanceData.length>0?(
                                        attendanceData.map((value: Array <{name:string, checkin:string, checkout:string, working_hours:number}>, index: number)=>{
                                            return (
                                                <tr key={index}>
                                                    <td>{value.name}</td>
                                                    <td>{value.checkin}</td>
                                                    <td>{value.checkout}</td>
                                                    <td>{value.working_hours}</td>
                                                </tr>
                                            );
                                        })
                                        
                                    ):(
                                        <tr>
                                            <td colSpan={4} className='text-center'> No record found </td>
                                        </tr>
                                    )}
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div> 
            </div>      
        </>
    )
}

export default ShowAttendanceList
