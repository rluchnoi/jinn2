import React from 'react';
import Header from './Header';
import { useEffect } from 'react';

import playerLoader from '../Helpers/playerLoader';


const Film = ({ film }) => {

    useEffect(() => {
        playerLoader.then(() => {
            const file = window.location.origin + '/test.mp4';

            let player = new Playerjs({
               id: 'player',
               file: file,
            });
        });
    }, []);

    return (
        <>
            <Header/>

            <div className='film'>

                <div className='filmInfo'>
                    <div className='filmImageName'>
                        <div className='filmImage'>
                            <img src={film.image} alt="Not Found"/>
                        </div>

                        <div className='filmName'>
                            {film.name}
                        </div>
                    </div>
                </div>

                <div id='player' className='player'>

                </div>

                
            </div>
        </>
    )
}

export default Film