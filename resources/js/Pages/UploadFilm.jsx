import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import FileInput from '@/Components/FileInput';
import TextInput from '@/Components/TextInput';
import { Link, useForm } from '@inertiajs/react';
import SelectSearch from 'react-select-search';
import Header from '@/Common/Header';
import Modal from '@/Components/Modal';

import { useState } from 'react';

import 'react-select-search/style.css';

export default function UploadFilm({ actors, directors }) {
    const { data, setData, post, errors, processing, wasSuccessful } = useForm();
    const [showModal, setShowModal] = useState(true);

    // submit form
    const submit = (e) => {
        e.preventDefault();

        post(route('film.upload'));

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
                            <h2 className="text-lg font-medium text-gray-900">Upload Film</h2>

                            <p className="mt-1 text-sm text-gray-600">
                                Upload film info and video file.
                            </p>
                        </header>

                        <form onSubmit={submit} className="mt-6 space-y-6">

                            <div className="uploadFilmRow">
                                <div>
                                    <InputLabel htmlFor="name" value="Name" />

                                    <div className="select-search-container">
                                        <TextInput
                                            id="name"
                                            className="mt-1 block w-full"
                                            value={data.name}
                                            onChange={(e) => setData('name', e.target.value)}
                                            required
                                            isFocused
                                        />
                                    </div>

                                    <InputError className="mt-2" message={errors.name} />
                                </div>

                                <div className="ml-6">
                                    <InputLabel htmlFor="year" value="Year" />

                                    <div className="select-search-container">
                                        <TextInput
                                            id="year"
                                            className="mt-1 block w-full"
                                            value={data.year}
                                            onChange={(e) => setData('year', e.target.value)}
                                            required
                                            isFocused
                                        />
                                    </div>

                                    <InputError className="mt-2" message={errors.year} />
                                </div>
                            </div>


                            
                            <div className="uploadFilmRow">
                                <div>
                                    <InputLabel htmlFor="actors" value="Actors" />

                                    <SelectSearch 
                                        id="actors"
                                        options={actors} 
                                        multiple={true}
                                        search={true}
                                        value={data.actors}
                                        placeholder="Choose actors" 
                                        onChange={(value) => setData('actors', value)}
                                        required
                                    />

                                    <InputError className="mt-2" message={errors.actors} />
                                </div>

                                <div className="ml-6">
                                    <InputLabel htmlFor="director" value="Director" />

                                    <SelectSearch 
                                        id="director"
                                        options={directors} 
                                        multiple={false}
                                        search={true}
                                        value={data.director}
                                        placeholder="Choose director" 
                                        onChange={(value) => setData('director', value)}
                                        required
                                    />

                                    <InputError className="mt-2" message={errors.director} />
                                </div>
                            </div>

                            

                            <div className="uploadFilmRow">
                                <div>
                                    <InputLabel htmlFor="video" value="Video" />

                                    <FileInput
                                        id="video"
                                        className="mt-1 block w-full"
                                        value={data.file}
                                        onChange={(e) => setData('video', e.target.files[0])}
                                        required
                                    />

                                    <InputError className="mt-2" message={errors.video} />
                                </div>

                                <div className="ml-6">
                                    <InputLabel htmlFor="image" value="Image" />

                                    <FileInput
                                        id="image"
                                        className="mt-1 block w-full"
                                        value={data.file}
                                        onChange={(e) => setData('image', e.target.files[0])}
                                        required
                                    />

                                    <InputError className="mt-2" message={errors.image} />
                                </div>
                            </div>

                            

                            <div className="flex items-center gap-4">
                                <PrimaryButton disabled={processing}>Save</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <Modal show={wasSuccessful && showModal}>
                <div className="p-6">
                    <h2 className="text-lg font-medium text-gray-900">
                        Data saved successfully
                    </h2>

                    <p className="mt-1 text-sm text-gray-600">
                        Video data is being converted to the streaming format. 
                        When conversion is complete you will be notified by an email.
                    </p>

                    <div className="mt-6 flex justify-end">
                        <PrimaryButton onClick={closeModal}>OK</PrimaryButton>
                    </div>
                </div>
            </Modal>
        </>
    );
}
