import React from 'react';

const Landing = ({ name }) => {
    return (
        <div className='landing'>
            <h1>Hello, this is landing!</h1>
            <p>Hello {name}, welcome to your first Inertia app!</p>
        </div>
    )
}

export default Landing
