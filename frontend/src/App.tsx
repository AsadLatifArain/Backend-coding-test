import { useState } from 'react'
import FileUploader from './components/FileUploader'
import ShowAttendanceList from './components/ShowAttendanceList'

function App() {

  return (
    <>
      <div className='container'>
        <FileUploader />
        <ShowAttendanceList />
      </div>
      
    </>
  )
}

export default App
