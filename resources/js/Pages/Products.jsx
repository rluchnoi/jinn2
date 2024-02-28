import React from 'react';

const Products = ({ products }) => {
    const listItems = products.map(product => <li>{product}</li>);

    return (
        <div className='products'>
            <ul>{listItems}</ul>
        </div>
    )
}

export default Products
