import React from 'react';
import Header from '../Common/Header';

const Partner = ({ auth, phone, email }) => {
    return (
        <>
            <Header tabName="Partner" auth={auth}/>

            <div className='partnerWrapper'>
                <div className='partner'>
                    <h1>Hello! </h1>

                    <p>
                        <span className="selected">Are</span>
                        <span> you dreaming about a remote job?</span>
                    </p>

                    <p>
                        <span>Do you like </span>
                        <span className="selected">watching</span>
                        <span> films?</span>
                    </p>
                    
                    <p>
                        <span>Have you ever thought that your knowledge can be </span>
                        <span className="selected">usefull?</span>
                    </p>

                    <h2>CONTACT US!</h2>
                    <i class="arrow down"></i>

                    <p>
                        <span>Phone: </span>
                        <span className="underlined">{phone}</span>
                    </p>
                    <p>
                        <span>Email: </span>
                        <span className="underlined">{email}</span>
                    </p>
                </div>
            </div>
        </>
    )
}

export default Partner
