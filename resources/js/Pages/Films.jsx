import React from 'react';
import { useState } from 'react';

import Header from '../Common/Header';
import Film from './Film';

const Films = ({ films }) => {
    const [film, setFilm] = useState(null);

    const url = window.location.href + '/';
    const listItems = films.map(film => 
        <swiper-slide id={film.id} className="filmItem" onClick={() => setFilm(film)}>
            <img src={film.image} alt="Image Not Found"></img>
        </swiper-slide>
    );

    return (
        <>
            <Header tabName="Home"/>

            <div className="filmAligner">
                <div className="filmWrapper">

                    <div className="filmSwiperWrapper">
                        <div className="nav-btn custom-prev-button">
                            <img src="/storage/app-images/left-arrow.svg" alt="No Image Found"/>
                        </div>

                        <swiper-container
                            slides-per-view="7"
                            space-between="20"
                            navigation="true"
                            navigation-next-el=".custom-next-button"
                            navigation-prev-el=".custom-prev-button"
                        >
                            {listItems}
                        </swiper-container>

                        <div className="nav-btn custom-next-button">
                            <img src="/storage/app-images/right-arrow.svg" alt="No Image Found"/>
                        </div>
                    </div>

                    <Film film={film}/>
                </div>
            </div>
        </>
    )
}

export default Films
