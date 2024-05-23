export default function FileInput({ className = '', ...props }) {
    return (
        <input
            {...props}
            type="file"
            className={
                'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ' +
                className
            }
        />
    );
}
