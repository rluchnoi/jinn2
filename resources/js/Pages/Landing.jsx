import React from 'react';
import Header from './Header';

const Landing = ({ name }) => {
    return (
        <>
            <Header tabName="Home"/>
            
            <div className='landing'>
                <h1>Hello, this is landing!</h1>
                <p>Hello {name}, welcome to Jinn 2!</p>
            </div>
        </>
    )
}

export default Landing
