import React from 'react';
import Header from './Header';

const Films = ({ films }) => {
    const url = window.location.href + '/';
    const listItems = films.map(product => <li><a href={url + product.id}>{product.name}</a></li>);

    return (
        <>
            <Header tabName="Films"/>

            <div className='films'>
                <ul>{listItems}</ul>
            </div>
        </>
    )
}

export default Films
