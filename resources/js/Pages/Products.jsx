import React from 'react';
import Header from './Header';

const Products = ({ products }) => {
    const listItems = products.map(product => <li>{product}</li>);

    return (
        <>
            <Header tabName="Products"/>

            <div className='products'>
                <ul>{listItems}</ul>
            </div>
        </>
    )
}

export default Products
