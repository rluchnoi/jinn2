import DeleteUserForm from './Partials/DeleteUserForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';

import Header from '@/Common/Header';
import { Link } from '@inertiajs/react';

export default function Edit({ mustVerifyEmail, status }) {
    return (
        <>
            <Header tabName="AdminTools"/>

            <div className='paddingTopWrapper'>
                <div className='flexColumn'>

                    <div className="linkBackWrapper">
                        <Link href={route('dashboard')}>
                            <div className="linkBack">
                                <i class="arrowSmall left"></i>
                                Dashboard
                            </div>
                        </Link>
                    </div>

                    <div className="greyWrapper">
                        <UpdateProfileInformationForm
                            mustVerifyEmail={mustVerifyEmail}
                            status={status}
                            className="max-w-xl"
                        />
                    </div>

                    <div className="greyWrapper">
                        <UpdatePasswordForm className="max-w-xl" />
                    </div>

                    <div className="greyWrapper">
                        <DeleteUserForm className="max-w-xl" />
                    </div>

                </div>
            </div>
        </>
    );
}
