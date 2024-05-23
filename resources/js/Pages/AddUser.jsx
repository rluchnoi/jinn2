import { useEffect, useState } from 'react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import Modal from '@/Components/Modal';

import Header from '@/Common/Header';
import { Link, useForm } from '@inertiajs/react';

export default function AddUser() {
    const [showModal, setShowModal] = useState(true);
    const { data, setData, post, processing, errors, wasSuccessful, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    // submit form
    const submit = (e) => {
        e.preventDefault();

        post(route('user.add'));

        setShowModal(true);
    };

    // close modal
    const closeModal = () => {
        setShowModal(false);
    };

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

                        <header>
                            <h2 className="text-lg font-medium text-gray-900">Add User</h2>

                            <p className="mt-1 text-sm text-gray-600">
                                Create a new user.
                            </p>
                        </header>

                        <form onSubmit={submit} className="mt-6 space-y-6">
                            <div>
                                <InputLabel htmlFor="name" value="Name" />

                                <TextInput
                                    id="name"
                                    name="name"
                                    value={data.name}
                                    className="mt-1 block w-full"
                                    autoComplete="name"
                                    isFocused={true}
                                    onChange={(e) => setData('name', e.target.value)}
                                    required
                                />

                                <InputError message={errors.name} className="mt-2" />
                            </div>

                            <div className="mt-4">
                                <InputLabel htmlFor="email" value="Email" />

                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 block w-full"
                                    autoComplete="username"
                                    onChange={(e) => setData('email', e.target.value)}
                                    required
                                />

                                <InputError message={errors.email} className="mt-2" />
                            </div>

                            <div className="mt-4">
                                <InputLabel htmlFor="password" value="Password" />

                                <TextInput
                                    id="password"
                                    type="password"
                                    name="password"
                                    value={data.password}
                                    className="mt-1 block w-full"
                                    autoComplete="new-password"
                                    onChange={(e) => setData('password', e.target.value)}
                                    required
                                />

                                <InputError message={errors.password} className="mt-2" />
                            </div>

                            <div className="mt-4">
                                <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    value={data.password_confirmation}
                                    className="mt-1 block w-full"
                                    autoComplete="new-password"
                                    onChange={(e) => setData('password_confirmation', e.target.value)}
                                    required
                                />

                                <InputError message={errors.password_confirmation} className="mt-2" />
                            </div>

                            <div className="flex items-center justify-end mt-4">
                                <PrimaryButton className="ms-4" disabled={processing}>
                                    Register
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <Modal show={wasSuccessful && showModal}>
                <div className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        User created succesfully
                    </h2>

                    <p className="mt-1 text-sm text-gray-600">
                        Verification email is send.
                    </p>

                    <div className="mt-6 flex justify-end">
                        <PrimaryButton onClick={closeModal}>OK</PrimaryButton>
                    </div>
                </div>
            </Modal>
        </>
    );
}
