import React from 'react';
import { useState } from 'react';

import Header from '../Common/Header';
import Film from './Film';

const Films = ({ films }) => {
    const [film, setFilm] = useState(null);

    const url = window.location.href + '/';
    const listItems = films.map(film => 
        <swiper-slide className="filmItem" onClick={() => setFilm(film)}>
            <img src={film.image} alt="Image Not Found"></img>
        </swiper-slide>
    );

    return (
        <>
            <Header tabName="Films"/>

            <swiper-container slides-per-view="5" space-between="20" mousewheel-invert="true" navigation="true">
                {listItems}
            </swiper-container>

            <Film film={film}/>
        </>
    )
}

export default Films
