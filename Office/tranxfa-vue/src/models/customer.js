export class Customer {
    /**
     * @type {string|null}
     */
    id = null;

    /**
     * @type {number|null}
     */
    crn = null;

    /**
     * @type {string|null}
     */
    firstName = null;

    /**
     * @type {string|null}
     */
    middleName = null;

    /**
     * @type {string|null}
     */
    lastName = null;

    /**
     * @type {string|null}
     */
    fullName = null;

    /**
     * @type {string|null}
     */
    uniqueIdentityNumber = null;

    /**
     * @type {string|null}
     */
    mobileNumber = null;

    /**
     * @type {string|null}
     */
    createdAt = null;

    /**
     * @type {string|null}
     */
    updatedAt = null;

    /**
     * @type {Country|null}
     */
    mobileNumberCountry = null;

    /**
     * @type {Account|null}
     */
    account = null;

    /**
     * @type {Session|null}
     */
    session = null;

    /**
     * @type {Country|null}
     */
    country = null;

    /**
     * @type {Country|null}
     */
    nationality = null;

    /**
     * @type {object|null}
     */
    address = null;

    /**
     * @type {object|null}
     */
    birthDetail = null;

    /**
     * @type {Array<CustomerAttribute>}
     */
    attributes = [];
}

export default Customer;