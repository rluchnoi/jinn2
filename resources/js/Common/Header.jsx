import React from 'react';
import { Link, usePage } from '@inertiajs/react';

const Header = ({ tabName }) => {
    const user = usePage().props.auth.user;

    const getClass = (name) => {
        return name === tabName ? 'active' : '';
    }

    return (
        <header className="header">
            <div>
                <Link
                    className={getClass('Home')} 
                    href={route('home')}
                >
                    Home
                </Link>
            </div>

            {user ? (
                <div>
                    <Link
                        className={getClass('AdminTools')} 
                        href={route('dashboard')}
                    >
                        Admin Tools
                    </Link>
                </div>
            ) : (
                <>
                    <div>
                        <Link
                            className={getClass('Partner')} 
                            href={route('become-a-partner')}
                        >
                            Become a Partner
                        </Link>
                    </div>
                    <div>
                        <Link
                            className={getClass('Login')} 
                            href={route('login')}
                        >
                            Log in
                        </Link>
                    </div>
                </>
            )}
        </header>
    )
}

export default Header
