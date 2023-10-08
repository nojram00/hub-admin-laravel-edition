import React, { useState } from 'react'
import { ReactDOM } from 'react'




export default function Sample(){
    // useState
    return(
        <>
            <h1>Hello</h1>
        </>
    )
}

if(document.getElementById('sample-react')){
    ReactDOM.render(<Sample/>, document.getElementById('sample-react'));
}
