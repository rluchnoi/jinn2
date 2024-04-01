import React from 'react';

const Header = ({ tabName }) => {

    const getClass = (name) => {
        return name === tabName ? 'active' : '';
    }

    return (
        <header className="header">
            <div>
                <a 
                    className={getClass('Home')} 
                    href="/"
                >
                    Home
                </a>
            </div>
            <div>
                <a 
                    className={getClass('Partner')} 
                    href="/become-a-partner"
                >
                    Become a Partner
                </a>
            </div>
        </header>
    )
}

export default Header
