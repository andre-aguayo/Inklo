import axios from "axios";

export const getUserInformationFromGit = async (login) => {
    try { return await axios.get(`https://api.github.com/users/${login}`); }
    catch (error) { console.error(error) }
};

export const getUserReposFromGit = async (login) => {
    try { return await axios.get(`https://api.github.com/users/${login}/repos`); }
    catch (error) { console.error(error) }
};

export const localStoreUser = async (login) => {
    try {
        return await axios.post(
            `/api/salvar-local`,
            {
                headers: {
                    'accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                login: login
            }
        );
    }
    catch (error) { console.error(error) }
};
