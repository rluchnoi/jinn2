import Header from '../Common/Header';
import { Link, useForm, usePage } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';

export default function Dashboard() {
    const isAdmin = usePage().props.auth.user.is_admin;

    const { post, processing } = useForm();

    const submit = (e) => {
        e.preventDefault();

        post(route('logout'));
    };

    return (
        <>
            <Header tabName="AdminTools"/>

            <div className='dashboardWrapper'>
                <div className='dashboard'>

                    <div className="dashboardPages">
                        <div className="dashboardPage">
                            <Link href={route('profile.edit')}>
                                Edit Profile
                            </Link>
                        </div>

                        {isAdmin && 
                            <div className="dashboardPage">
                                <Link href={route('user.add-view')}>
                                    Add User
                                </Link>
                            </div>
                        }

                        <div className="dashboardPage">
                            <Link href={route('film.upload-view')}>
                                Upload Film
                            </Link>
                        </div>

                        <form onSubmit={submit} className="logoutForm">
                            <div className="flex items-center gap-4">
                                <PrimaryButton disabled={processing}>Logout</PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </>
    );
}
