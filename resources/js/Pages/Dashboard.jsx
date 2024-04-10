import Header from '../Common/Header';
import { Link, useForm } from '@inertiajs/react';
import PrimaryButton from '@/Components/PrimaryButton';

export default function Dashboard({ auth }) {

    const { post, processing } = useForm();

    const submit = (e) => {
        e.preventDefault();

        post(route('logout'));
    };

    return (
        <>
            <Header tabName="AdminTools" auth={auth}/>

            <div className='dashboardWrapper'>
                <div className='dashboard'>

                    <div className="dashboardPages">
                        <div className="dashboardPage">
                            <Link href={route('profile.edit')}>
                                Edit Profile
                            </Link>
                        </div>

                        <div className="dashboardPage">
                            <div>Add User</div>
                        </div>

                        <div className="dashboardPage">
                            <div>Upload Film</div>
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
