# iQ Suite JavaScript/TypeScript SDK

[![Node.js](https://img.shields.io/badge/node-14+-green.svg)](https://nodejs.org/)
[![License](https://img.shields.io/github/license/iqsuite/iqsuite-js)](LICENSE)
## Overview

Welcome to the **iQ Suite JavaScript/TypeScript SDK**! This Software Development Kit (SDK) allows you to seamlessly integrate with the **iQ Suite Platform**, a comprehensive Retrieval Augmented Generation as a Service (RAGaaS). Whether you're a seasoned developer or just starting your coding journey, this guide will help you harness the power of iQ Suite to enhance your applications with advanced search and data processing capabilities.

### What is Retrieval Augmented Generation (RAG)?

**Retrieval Augmented Generation (RAG)** is a powerful approach that combines traditional information retrieval techniques with advanced language models. It enables applications to fetch relevant information from large datasets and generate insightful, contextually accurate responses. In simpler terms, RAG helps your applications understand and process data more intelligently, providing users with precise and meaningful answers based on the content they interact with.

### Key Features

- **Multi-Format Document Support:** Easily handle PDFs, Word documents, PowerPoint presentations, and raw text.
- **Hybrid Semantic Search:** Combine keyword searches with semantic understanding for more accurate results.
- **Natural Language Interaction:** Engage with your documents through conversational queries.
- **Instant RAG:** Perform on-the-fly analysis without the need for persistent indexing.
- **Asynchronous Processing:** Manage tasks efficiently using webhooks.
- **Real-Time Notifications:** Receive immediate updates on task statuses.
- **Secure API Authentication:** Protect your data with robust authentication mechanisms.

## Table of Contents

- [Installation](#installation)
- [Features](#features)
- [Quick Start](#quick-start)
- [Usage](#usage)
    - [Authentication](#authentication)
    - [Document-based RAG](#document-based-rag)
        - [Create Index](#create-index)
        - [Create Index with Polling](#create-index-with-polling)
        - [Add Document to Index](#add-document-to-index)
        - [Add Document with Polling](#add-document-with-polling)
        - [List Indices](#list-indices)
        - [List Documents](#list-documents)
        - [Delete Document](#delete-document)
        - [Retrieve](#retrieve)
        - [Search](#search)
        - [Task Status](#task-status)
    - [Instant RAG](#instant-rag)
        - [Create Instant RAG](#create-instant-rag)
        - [Query Instant RAG](#query-instant-rag)
    - [Webhooks](#webhooks)
        - [Create Webhook](#create-webhook)
        - [List Webhooks](#list-webhooks)
        - [Update Webhook](#update-webhook)
        - [Delete Webhook](#delete-webhook)
    - [Rate Limiting and Request Throttling](#rate-limiting-and-request-throttling)
- [Supported Documents & Max File Size](#supported-documents-and-max-file-size)
- [Error Handling](#error-handling)
- [Support](#support)
- [License](#license)

## Installation

Installing the iQ Suite JavaScript/TypeScript SDK is straightforward. Follow the steps below to get started.

### Prerequisites

- **Node.js:** Ensure you have Node.js version 14 or higher installed on your system. You can download Node.js from the [official website](https://nodejs.org/).
- **npm or Yarn:** Node's package manager should be available. It's typically included with Node.js installations.

### Steps to Install

1. **Open Your Terminal or Command Prompt:**

    - **Windows:** Press `Win + R`, type `cmd`, and hit `Enter`.
    - **macOS/Linux:** Open the Terminal application.

2. **Initialize Your Project (If Not Already Initialized):**

   If you don't have a `package.json` file in your project directory, initialize it using:

   ```bash
   npm init -y
   ```

   or, if you prefer Yarn:

   ```bash
   yarn init -y
   ```

3. **Install the SDK Using npm or Yarn:**

    - **Using npm:**

      ```bash
      npm install iqsuite-node-sdk
      ```

    - **Using Yarn:**

      ```bash
      yarn add iqsuite-node-sdk
      ```

   This command downloads and installs the latest version of the iQ Suite JavaScript/TypeScript SDK from npm.

4. **Verify Installation:**

   To ensure the SDK was installed correctly, you can check the `node_modules` directory or verify it in your `package.json` dependencies.

## Features

The iQ Suite JavaScript/TypeScript SDK offers a wide range of features designed to make data retrieval and processing efficient and effective. Here's a detailed look at what you can do:

- 📄 **Multi-Format Document Support:** Easily ingest and process various document types, including PDFs, Word documents, PowerPoint presentations, and raw text files.

- 🔍 **Hybrid Semantic Search:** Combines traditional keyword-based search with advanced semantic understanding to deliver more accurate and relevant search results.

- 💬 **Natural Language Chat:** Interact with your documents using conversational queries, making data exploration intuitive and user-friendly.

- 🚀 **Instant RAG:** Perform immediate analysis on your data without the need to create and maintain persistent indices.

- 🔄 **Asynchronous Processing:** Handle long-running tasks efficiently using webhooks, allowing your application to remain responsive.

- ⚡ **Real-Time Notifications:** Receive instant updates on the status of your tasks, ensuring you're always informed about ongoing processes.

- 🔒 **Secure API Authentication:** Protect your data and ensure secure interactions with robust API key management.

## Quick Start

This section will guide you through the initial steps to get your application up and running with the iQ Suite JavaScript/TypeScript SDK. Whether you're setting up for the first time or integrating it into an existing project, these instructions will help you get started quickly.

### Step 1: Obtain Your API Key

Before you can interact with the iQ Suite Platform, you'll need an API key. This key authenticates your requests and ensures secure access to your data.

> **⚠️ Important:** *Never expose your API key in version control systems (like GitHub) or unsecured environments. Always use environment variables or secure key management systems to store your API keys.*

#### How to Get Your API Key

1. **Visit the iQ Suite Platform:**

   Open your web browser and navigate to the [iQ Suite Platform](https://iqsuite.ai).

2. **Sign Up or Log In:**

    - **New Users:** Click on the **Sign Up** button and create an account using your email address or GitHub account.
    - **Existing Users:** Click on **Log In** and enter your credentials.

3. **Navigate to API Keys:**

   Once logged in, locate the **API Keys** section in the sidebar menu. This section manages all your API keys.

4. **Create a New API Key:**

    - Click on the **Create API Key** button.
    - Provide a **name** for your API key (e.g., "Development Key" or "Production Key") to help you identify its purpose.
    - Click **Create**.

5. **Store Your API Key Securely:**

    - After creation, the API key will be displayed **only once**. Make sure to **copy and save** it in a secure location.
    - **Do not** share your API key publicly or commit it to version control repositories.

### Step 2: Initialize the Client

With your API key in hand, you can now initialize the iQ Suite client in your JavaScript or TypeScript application.

#### Using Environment Variables (Recommended)

Storing your API key in an environment variable enhances security by keeping sensitive information out of your codebase.

1. **Set the Environment Variable:**

    - **Windows:**

      ```bash
      set IQSUITE_API_KEY=your_api_key_here
      ```

    - **macOS/Linux:**

      ```bash
      export IQSUITE_API_KEY=your_api_key_here
      ```

2. **Initialize the Client in Your Application:**

   ```javascript
   // Import the IQSuiteClient
   const { IQSuiteClient } = require('iqsuite-node-sdk');

   // Retrieve the API key from environment variables
   const apiKey = process.env.IQSUITE_API_KEY;

   // Initialize the iQ Suite client
   const client = new IQSuiteClient({
     apiKey,
   });
   ```

   ```typescript
   // Import the IQSuiteClient
   import { IQSuiteClient } from 'iqsuite-node-sdk';

   // Retrieve the API key from environment variables
   const apiKey: string | undefined = process.env.IQSUITE_API_KEY;

   if (!apiKey) {
     throw new Error("IQSUITE_API_KEY is not defined in environment variables.");
   }

   // Initialize the iQ Suite client
   const client = new IQSuiteClient({
     apiKey,
   });
   ```

### Step 3: Verify Your Setup

Ensure that your client is correctly authenticated by fetching your user details.

```javascript
// JavaScript Example
const { AuthenticationError, APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const user = await client.getUser();
    console.log(`Authenticated as: ${user.email}`);
  } catch (error) {
    if (error instanceof AuthenticationError) {
      console.error('Authentication failed: Invalid API key.');
    } else if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { AuthenticationError, APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    const user = await client.getUser();
    console.log(`Authenticated as: ${user.email}`);
  } catch (error) {
    if (error instanceof AuthenticationError) {
      console.error('Authentication failed: Invalid API key.');
    } else if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

- **Expected Output:**

  If the API key is valid, you'll see an output similar to:

  ```
  Authenticated as: your_email@example.com
  ```

- **Error Handling:**

    - **AuthenticationError:** Indicates an invalid or expired API key.
    - **APIError:** Covers other API-related issues, such as server errors.

## Usage

The iQ Suite JavaScript/TypeScript SDK offers a variety of functionalities to help you interact with the iQ Suite Platform effectively. This section provides detailed instructions and examples to guide you through different use cases, ensuring that even those new to coding can implement these features with ease.

### Authentication

Before accessing any of the platform's features, you must authenticate using your API key. This process ensures that your requests are secure and authorized.

#### Example: Retrieve Current User Information

This example demonstrates how to verify your authentication by fetching details about the currently authenticated user.

```javascript
// JavaScript Example
(async () => {
  try {
    // Attempt to retrieve the authenticated user's information
    const user = await client.getUser();
    console.log(`Authenticated as: ${user.email}`);
  } catch (error) {
    if (error instanceof AuthenticationError) {
      // Handle invalid or expired API keys
      console.error('Authentication failed: Invalid API key.');
    } else if (error instanceof APIError) {
      // Handle other API-related errors
      console.error(`API Error: ${error.message}`);
    } else {
      // Handle unexpected errors
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { AuthenticationError, APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Attempt to retrieve the authenticated user's information
    const user = await client.getUser();
    console.log(`Authenticated as: ${user.email}`);
  } catch (error) {
    if (error instanceof AuthenticationError) {
      // Handle invalid or expired API keys
      console.error('Authentication failed: Invalid API key.');
    } else if (error instanceof APIError) {
      // Handle other API-related errors
      console.error(`API Error: ${error.message}`);
    } else {
      // Handle unexpected errors
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.getUser():** Sends a request to the iQ Suite Platform to retrieve information about the authenticated user.
- **AuthenticationError:** Catches errors related to invalid or expired API keys.
- **APIError:** Catches other general API errors.

**Output:**

If successful, the script will print the authenticated user's email address. Otherwise, it will display an appropriate error message.

### Document-based RAG

Document-based RAG involves creating indices from your documents and performing operations like searching, retrieving content, and managing documents within these indices. This section guides you through the various operations you can perform.

#### Create Index

Creating an index allows the platform to process and understand your documents, enabling advanced search and retrieval capabilities.

> **ℹ️ Information:** *Creating an index is an asynchronous operation. This means the process runs in the background, and you'll receive a task ID to monitor its progress.*

> [!CAUTION]
> To ensure optimal system performance and maintain service quality, create index function calls are subject to rate limiting controls ie, 10 requests per minute..*

##### Example: Create a New Index from a Document

```javascript
// JavaScript Example
const fs = require('fs');
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Read the document file as a buffer
    const documentBuffer = fs.readFileSync('path/to/your/document.pdf');

    // Create a new index with the document
    const taskResponse = await client.createIndex(documentBuffer, 'document.pdf');
    console.log(`Task ID: ${taskResponse.task_id}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import fs from 'fs';
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Read the document file as a buffer
    const documentBuffer = fs.readFileSync('path/to/your/document.pdf');

    // Create a new index with the document
    const taskResponse = await client.createIndex(documentBuffer, 'document.pdf');
    console.log(`Task ID: ${taskResponse.task_id}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **fs.readFileSync():** Reads the PDF file in binary mode.
- **client.createIndex():** Initiates the index creation process.
- **taskResponse.task_id:** Receives a unique identifier to track the status of the indexing task.

**Next Steps:**

Use the `Task ID` to monitor the progress of the index creation using polling or webhooks.

#### Create Index with Polling

Polling allows your application to regularly check the status of an asynchronous task until it completes.

##### Example: Create Index and Wait for Completion

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Read the document file as a buffer
    const documentBuffer = fs.readFileSync('path/to/your/document.pdf');

    // Initiate index creation and wait for it to complete
    const [createResponse, taskStatus] = await client.createIndexAndPoll(
      documentBuffer,
      'document.pdf',
      10,       // maxRetries
      3000      // pollInterval in ms
    );

    console.log(`Index ID: ${createResponse.task_id}`);
    console.log(`Task Status: ${taskStatus.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import fs from 'fs';
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Read the document file as a buffer
    const documentBuffer = fs.readFileSync('path/to/your/document.pdf');

    // Initiate index creation and wait for it to complete
    const [createResponse, taskStatus] = await client.createIndexAndPoll(
      documentBuffer,
      'document.pdf',
      10,       // maxRetries
      3000      // pollInterval in ms
    );

    console.log(`Index ID: ${createResponse.task_id}`);
    console.log(`Task Status: ${taskStatus.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.createIndexAndPoll():** Combines index creation and polling into a single step.
- **poll_interval:** Defines how frequently the client checks the task status.
- **max_retries:** Limits the number of polling attempts to prevent indefinite waiting.

**Output:**

Once the index is successfully created, the script will display the `Index ID` and the final `Task Status`.

#### Add Document to Index

Adding documents to an existing index allows you to expand the knowledge base your application can query.

> **ℹ️ Information:** *Adding documents is also an asynchronous process. Ensure that the index you are adding to already exists.*

##### Example: Add a New Document to an Existing Index

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Read the new document file as a buffer
    const newDocumentBuffer = fs.readFileSync('path/to/your/new-document.pdf');

    // Add the document to the specified index
    const taskResponse = await client.addDocument(
      'your_index_id',           // Replace with your actual Index ID
      newDocumentBuffer,
      'new-document.pdf'
    );

    console.log(`Task ID: ${taskResponse.task_id}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import fs from 'fs';
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Read the new document file as a buffer
    const newDocumentBuffer = fs.readFileSync('path/to/your/new-document.pdf');

    // Add the document to the specified index
    const taskResponse = await client.addDocument(
      'your_index_id',           // Replace with your actual Index ID
      newDocumentBuffer,
      'new-document.pdf'
    );

    console.log(`Task ID: ${taskResponse.task_id}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.addDocument():** Sends a request to add the new document to the specified index.
- **'your_index_id':** Replace with your actual Index ID obtained earlier.

**Next Steps:**

Use the `Task ID` to monitor the progress of the document addition using polling or webhooks.

#### Add Document with Polling

Wait for the document addition process to complete by periodically checking its status.

##### Example: Add Document and Wait for Completion

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Read the new document file as a buffer
    const newDocumentBuffer = fs.readFileSync('path/to/your/new-document.pdf');

    // Add the document and wait for the task to complete
    const [addResponse, taskStatus] = await client.addDocumentAndPoll(
      'your_index_id',
      newDocumentBuffer,
      'new-document.pdf',
      10,       // maxRetries
      3000      // pollInterval in ms
    );

    console.log("Document indexing completed");
    console.log(`Status Details: ${taskStatus.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import fs from 'fs';
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Read the new document file as a buffer
    const newDocumentBuffer = fs.readFileSync('path/to/your/new-document.pdf');

    // Add the document and wait for the task to complete
    const [addResponse, taskStatus] = await client.addDocumentAndPoll(
      'your_index_id',
      newDocumentBuffer,
      'new-document.pdf',
      10,         // maxRetries
      3000        // pollInterval in ms
    );

    console.log("Document indexing completed");
    console.log(`Status Details: ${taskStatus.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.addDocumentAndPoll():** Combines document addition and polling into a single step.
- **poll_interval & max_retries:** Control the polling behavior.

**Output:**

Once the document is successfully added, the script will display the `Document ID` and the final `Task Status`.

#### List Indices

Retrieve a list of all indices you have created. This is useful for managing and selecting the correct index for your operations.

##### Example: List All Indices

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const indices = await client.listIndexes();
    if (indices.length === 0) {
      console.log("No indices found.");
    } else {
      indices.forEach(index => {
        console.log(`Index ID: ${index.id}`);
        console.log(`Name: ${index.name}`);
        console.log(`Created At: ${index.created_at}`);
        console.log(`Document Count: ${index.document_count}`);
        console.log('---');
      });
    }
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, Index } from 'iqsuite-node-sdk';

(async () => {
  try {
    const indices: Index[] = await client.listIndexes();
    if (indices.length === 0) {
      console.log("No indices found.");
    } else {
      indices.forEach(index => {
        console.log(`Index ID: ${index.id}`);
        console.log(`Name: ${index.name}`);
        console.log(`Created At: ${index.created_at}`);
        console.log(`Document Count: ${index.document_count}`);
        console.log('---');
      });
    }
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.listIndexes():** Sends a request to retrieve all indices.
- **indices:** Contains the list of indices returned by the API.

**Output:**

The script will print the `Index ID`, `Name`, `Created At`, and `Document Count` for each index, helping you identify which one to use.

#### List Documents

Retrieve all documents within a specific index. This helps you understand the contents and manage the documents effectively.

##### Example: List All Documents in an Index

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const documents = await client.getDocuments('your_index_id');
    documents.documents.forEach(doc => {
      console.log(`Document ID: ${doc.id}`);
      console.log(`Created At: ${doc.created_at}`);
      console.log(`Updated At: ${doc.updated_at}`);
      console.log('---');
    });
    console.log(`Index ID: ${documents.index}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, DocumentListResponse } from 'iqsuite-node-sdk';

(async () => {
  try {
    const documents: DocumentListResponse = await client.getDocuments('your_index_id');
    documents.data.documents.forEach(doc => {
      console.log(`Document ID: ${doc.id}`);
      console.log(`Created At: ${doc.created_at}`);
      console.log(`Updated At: ${doc.updated_at}`);
      console.log('---');
    });
    console.log(`Index ID: ${documents.data.index}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.getDocuments('your_index_id'):** Fetches all documents within the specified index.
- **documents.data.documents:** Contains the list of documents returned by the API.

**Output:**

The script will print the `Document ID`, `Created At`, and `Updated At` for each document, aiding in document management.

#### Delete Document

Remove a specific document from an index. This action is irreversible, so proceed with caution.

> **⚠️ Important:** *Deleting a document permanently removes it from the index and cannot be undone.*

##### Example: Delete a Document from an Index

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Attempt to delete the specified document from the index
    await client.deleteDocument('your-index-id', 'document-id-to-delete');
    console.log("Document deleted successfully.");
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error deleting document: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Attempt to delete the specified document from the index
    await client.deleteDocument('your-index-id', 'document-id-to-delete');
    console.log("Document deleted successfully.");
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error deleting document: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.deleteDocument('your-index-id', 'document-id-to-delete'):** Sends a request to delete the specified document.
- **'your-index-id':** Replace with your actual Index ID.
- **'document-id-to-delete':** Replace with the Document ID you wish to delete.

**Output:**

If successful, the script will confirm the deletion. Otherwise, it will display an error message.

### Retrieve

Engage in natural language conversations with your indexed documents. This feature allows you to ask questions and receive answers based on the content of your documents.

> **💡 Tip:** *Formulate clear and specific questions to get the most accurate responses.*

##### Example: Query with Your Index

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Send a natural language query to the specified index
    const response = await client.retrieve(
      'your-index-id',
      "What are the main points discussed in the document?"
      'document_id' // Optional document_id parameter to filter and retrieve from a specific document
    );
    console.log(`Response: ${JSON.stringify(response, null, 2)}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Send a natural language query to the specified index
    const response = await client.retrieve(
      'your-index-id',
      "What are the main points discussed in the document?",
      'document_id' // Optional document_id parameter to filter and retrieve from a specific document
    );
    console.log(`Response: ${JSON.stringify(response, null, 2)}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.retrieve():** Sends the query to the platform and retrieves the response.
- **'your-index-id':** Replace with your actual Index ID.
- **Query String:** The natural language question you want to ask.
- **document_id:** Document ID parameter to filter and retrieve from a specific document

**Output:**

The script will display the response generated based on the content of your indexed documents.

### Search

Perform precise and accurate searches within your indexed documents. This feature leverages both keyword and semantic understanding to deliver relevant results.

##### Example: Perform a Search Query

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const results = await client.search(
      'your_index_id',
      "neural networks"
    );
    console.log(`Search Results: ${JSON.stringify(results, null, 2)}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    const results = await client.search(
      'your_index_id',
      "neural networks"
    );
    console.log(`Search Results: ${JSON.stringify(results, null, 2)}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **query="neural networks":** The search term you want to look for within your documents.
- **client.search():** Sends the search query to the platform.
- **results:** Contains the list of search results returned by the API.

**Output:**

The script will print each document that matches the search query along with a relevance score, indicating how closely the document matches the query.

#### Task Status

Monitor the progress of any asynchronous operation, such as creating an index or adding a document. This helps you manage long-running tasks effectively.

##### Example: Check Task Status

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Replace 'your-task-id' with the actual Task ID you received earlier
    const status = await client.getTaskStatus('your-task-id');
    console.log(`Task Status: ${status.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }

  // Optional: Polling until the task is complete
  const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));

  try {
    while (true) {
      const status = await client.getTaskStatus('your-task-id');
      console.log(`Status: ${status.status}`);
      if (status.status === 'completed') {
        console.log("Task completed successfully.");
        break;
      } else if (status.status === 'failed') {
        console.log("Task failed.");
        break;
      }
      await delay(5000); // Wait for 5 seconds before checking again
    }
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError } from 'iqsuite-node-sdk';

const delay = (ms: number): Promise<void> => new Promise(resolve => setTimeout(resolve, ms));

(async () => {
  try {
    // Replace 'your-task-id' with the actual Task ID you received earlier
    const status = await client.getTaskStatus('your-task-id');
    console.log(`Task Status: ${status.status}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }

  // Optional: Polling until the task is complete
  try {
    while (true) {
      const status = await client.getTaskStatus('your-task-id');
      console.log(`Status: ${status.status}`);
      if (status.status === 'completed') {
        console.log("Task completed successfully.");
        break;
      } else if (status.status === 'failed') {
        console.log("Task failed.");
        break;
      }
      await delay(5000); // Wait for 5 seconds before checking again
    }
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.getTaskStatus('your-task-id'):** Fetches the current status of the specified task.
- **Polling Loop:** Continuously checks the task status every 5 seconds until it completes or fails.

**Output:**

The script will print the current status of the task. Once completed, it will confirm the success or indicate if the task failed.

### Instant RAG

Instant RAG allows you to perform quick, one-time analyses on your text content without the need to create and maintain persistent indices. This is ideal for extracting key insights from smaller or temporary datasets.

> **ℹ️ Note:** *Instant RAG supports up to 8,000 tokens, approximately 32,000 characters or 26 pages of content.*

#### Create Instant RAG

##### Example: Initiate an Instant RAG Session

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Define the context text you want to analyze
    const context = `
      Your extensive text content goes here. This can be a comprehensive document
      that you need to analyze or query immediately without creating a persistent index.
    `;

    // Send a request to create an Instant RAG session
    const response = await client.createInstantRag(context);
    
    console.log(`Message: ${response.message}`);
    console.log(`ID: ${response.id}`);
    console.log(`Query URL: ${response.query_url}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, InstantRagResponse } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Define the context text you want to analyze
    const context: string = `
      Your extensive text content goes here. This can be a comprehensive document
      that you need to analyze or query immediately without creating a persistent index.
    `;

    // Send a request to create an Instant RAG session
    const response: InstantRagResponse = await client.createInstantRag(context);
    
    console.log(`Message: ${response.message}`);
    console.log(`ID: ${response.id}`);
    console.log(`Query URL: ${response.query_url}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **context:** The text content you want to analyze.
- **client.createInstantRag():** Initiates an Instant RAG session with the provided context.

**Output:**

The script will display the `Message`, `ID`, and `Query URL` associated with the Instant RAG session.

#### Query Instant RAG

##### Example: Query Your Instant RAG Session
> [!CAUTION]
> To ensure optimal system performance and maintain service quality, query index function calls are subject to rate limiting controls ie, 10 requests per minute..*


```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Assume you have the Instant RAG ID from the previous step
    const instantRagId = 'your_instant_rag_id';

    // Send a query to the Instant RAG session
    const response = await client.queryInstantRag(
      instantRagId,
      'your search query'
    );

    console.log(`UUID: ${response.uuid}`);
    console.log(`Total Tokens: ${response.total_tokens}`);
    console.log(`Answer: ${response.retrieval_response}`);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, InstantRagQueryResponse } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Assume you have the Instant RAG ID from the previous step
    const instantRagId: string = 'your_instant_rag_id';

    // Send a query to the Instant RAG session
    const response: InstantRagQueryResponse = await client.queryInstantRag(
      instantRagId,
      'your search query'
    );

    console.log(`UUID: ${response.uuid}`);
    console.log(`Total Tokens: ${response.total_tokens}`);
    console.log(`Answer: ${response.answer}`);
    if (response.source_documents) {
      console.log('Source Documents:');
      response.source_documents.forEach(doc => {
        console.log(`- ID: ${doc.id}, File Name: ${doc.file_name}`);
      });
    }
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`API Error: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **instantRagId:** The Instant RAG ID obtained from the previous step.
- **query="...":** The question you want to ask based on the provided context.
- **client.queryInstantRag():** Sends the query to the Instant RAG session and retrieves the response.

**Output:**

The script will display the `UUID`, `Total Tokens`, `Answer`, and details of any `Source Documents` associated with the response.

### Webhooks

Webhooks are essential for handling asynchronous operations efficiently. They allow your application to receive real-time notifications about events, such as task completions, without the need to continuously poll the API.

> **💡 Tip:** *Webhooks are recommended for production environments to improve scalability and reduce unnecessary API calls.*

#### Create Webhook

Set up a webhook to receive notifications about specific events from the iQ Suite Platform.

##### Example: Create a New Webhook

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const webhook = await client.createWebhook(
      "https://your-domain.com/webhook",   // Your custom domain where the events notifications will be sent
      "Processing Events",                // Webhook name
      "your-webhook-secret",              // Add a layer of security with secret
      "true"                              // Webhook Enabled in strings (true/false)
    );

    console.log('Webhook Created:', webhook);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error creating webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, WebhookResponse } from 'iqsuite-node-sdk';

(async () => {
  try {
    const webhook: WebhookResponse = await client.createWebhook(
      "https://your-domain.com/webhook",   // Your custom domain where the events notifications will be sent
      "Processing Events",                // Webhook name
      "your-webhook-secret",              // Add a layer of security with secret
      "true"                              // Webhook Enabled in strings (true/false)
    );

    console.log('Webhook Created:', webhook);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error creating webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **url:** The endpoint in your application that will receive webhook notifications. Ensure this endpoint is publicly accessible.
- **name:** A name to help you identify the webhook.
- **secret:** A secret key used to verify the authenticity of incoming webhook requests.
- **enabled:** Whether the webhook is active.

**Output:**

The script will display the details of the created webhook, including the `Webhook ID`, `URL`, `Name`, `Enabled` status, and timestamps.

#### List Webhooks

Retrieve a list of all webhooks you have set up. This helps you manage and review your webhook configurations.

##### Example: List All Webhooks

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const webhooks = await client.listWebhooks();
    console.log("\n=== Webhooks List ===");
    console.log(`ID\t\t\t\tName\t\t\t\tURL\t\t\t\tStatus\t\tCreated At`);
    console.log("-".repeat(100));

    webhooks.forEach(webhook => {
      const status = webhook.enabled ? "Enabled" : "Disabled";
      console.log(`${webhook.id}\t${webhook.name}\t${webhook.url}\t${status}\t${webhook.created_at}`);
    });
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error getting webhooks: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, Webhook } from 'iqsuite-node-sdk';

(async () => {
  try {
    const webhooks: Webhook[] = await client.listWebhooks();
    console.log("\n=== Webhooks List ===");
    console.log(`ID\t\t\t\tName\t\t\t\tURL\t\t\t\tStatus\t\tCreated At`);
    console.log("-".repeat(100));

    webhooks.forEach(webhook => {
      const status = webhook.enabled ? "Enabled" : "Disabled";
      console.log(`${webhook.id}\t${webhook.name}\t${webhook.url}\t${status}\t${webhook.created_at}`);
    });
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error getting webhooks: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **client.listWebhooks():** Sends a request to retrieve all webhooks.
- **webhooks:** Contains the list of webhooks returned by the API.

**Output:**

The script will print the `Webhook ID`, `Name`, `URL`, `Enabled` status, and `Created At` timestamp for each webhook, aiding in webhook management.

#### Update Webhook

Modify the configuration of an existing webhook. This is useful if you need to change the endpoint URL, name, or other settings.

##### Example: Update an Existing Webhook

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    const updatedWebhook = await client.updateWebhook(
      "whk_abc123",                        // The ID of the webhook to update
      "https://your-domain.com/new-endpoint", // The new endpoint URL
      "Updated Webhook Name",              // The new name for the webhook
      "true"                                 // Whether the webhook should be enabled in strings (true/false)
    );

    console.log('Updated Webhook:', updatedWebhook);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error updating webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError, WebhookResponse } from 'iqsuite-node-sdk';

(async () => {
  try {
    const updatedWebhook: WebhookResponse = await client.updateWebhook(
      "whk_abc123",                        // The ID of the webhook to update
      "https://your-domain.com/new-endpoint", // The new endpoint URL
      "Updated Webhook Name",              // The new name for the webhook
      "true"                                 // Whether the webhook should be enabled in strings (true/false)
    );

    console.log('Updated Webhook:', updatedWebhook);
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error updating webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **webhook_id:** Replace with the actual Webhook ID you wish to update.
- **client.updateWebhook():** Sends a request to update the webhook's configuration.

**Output:**

The script will display the updated webhook details, confirming the changes.

#### Delete Webhook

Remove a webhook from your account. This stops all notifications to the specified endpoint immediately.

> **⚠️ Important:** *Deleting a webhook is irreversible and will immediately cease all notifications to the associated endpoint.*

##### Example: Delete a Webhook

```javascript
// JavaScript Example
const { APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Attempt to delete the specified webhook
    await client.deleteWebhook('your_webhook_id');
    console.log("Webhook deleted successfully.");
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error deleting webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

```typescript
// TypeScript Example
import { APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Attempt to delete the specified webhook
    await client.deleteWebhook('your_webhook_id');
    console.log("Webhook deleted successfully.");
  } catch (error) {
    if (error instanceof APIError) {
      console.error(`Error deleting webhook: ${error.message}`);
    } else {
      console.error('Unexpected Error:', error);
    }
  }
})();
```

**Explanation:**

- **webhook_id:** Replace with the actual Webhook ID you wish to delete.
- **client.deleteWebhook():** Sends a request to delete the specified webhook.

**Output:**

If successful, the script will confirm the deletion. Otherwise, it will display an error message.

#### Webhook Events

When specific events occur, the iQ Suite Platform sends POST requests to your webhook endpoint with relevant information. Here's what a typical webhook payload looks like:

```json
{
  "event": "index_creation_complete",
  "task_id": "2dca8de9-8a51-497a-9a45-cc6541d4a7bc",
  "index_id": "08c9ab9f-1b1c-4fc8-8679-a63387654893",
  "status": "completed"
}
```

**Explanation of Payload Fields:**

- **event:** The type of event that triggered the webhook (e.g., `index_creation_complete`).
- **task_id:** The unique identifier for the task associated with the event.
- **index_id:** The unique identifier for the index associated with the event.
- **status:** The current status of the task (e.g., `completed`, `failed`).

> **🔒 Important:** *Always verify webhook signatures in production environments to ensure that incoming requests are genuinely from the iQ Suite Platform and not malicious actors.*

### Supported Documents and Max File Size

The iQ Suite Platform supports a variety of document formats, ensuring flexibility in handling different types of data. Additionally, documents are automatically processed with Optical Character Recognition (OCR) when applicable, enabling the extraction of text from images or scanned documents. The **max file size** is capped at  **20 MB** with the file support of PDF, Docx and PPT.

#### Rate Limiting / Throttling

All the functions are processed under the rate limiter. The allowed usage volume is capped under:

```
10 requests per minute to rag-create-index.
50 requests per minute to rag-retrieve-index.
```

#### Supported Formats

1. **PDF Files (.pdf):**
    - **Text-based PDFs:** PDFs that contain selectable text.
    - **Scanned PDFs with OCR Support:** Image-based PDFs that require OCR to extract text.

2. **Microsoft Word Documents:**
    - **Modern Format (.docx):** The current standard format for Word documents.
    - **Legacy Format (.doc):** Older Word document format.

3. **Microsoft PowerPoint Presentations:**
    - **Modern Format (.pptx):** The current standard format for PowerPoint presentations.
    - **Legacy Format (.ppt):** Older PowerPoint presentation format.

### Best Practices for Document Preparation

- **Ensure Proper Formatting:** Well-structured documents with clear headings, subheadings, and consistent formatting improve processing accuracy.
- **Clear and Legible Text:** Especially important for scanned documents, as OCR accuracy depends on text clarity.


# Rate Limiting and Request Throttling

To ensure optimal system performance and maintain service quality, below SDK function calls are subject to rate limiting controls. These measures help prevent server overload while ensuring consistent service delivery for all users of the iQ Suite platform.

## Request Limits

The following rate limits are enforced per endpoint:

| Endpoint | Rate Limit |
|----------|------------|
| `rag-create-index` | 10 requests per minute |
| `rag-retrieve-index` | 50 requests per minute |

When these limits are exceeded, requests will be queued and processed according to our throttling algorithm. This helps maintain system stability while maximizing throughput for all users.

Please ensure your application implements appropriate retry logic and respects these rate limits to optimize your integration with the iQ Suite services.


## Error Handling

Robust error handling is crucial for building reliable and user-friendly applications. The iQ Suite JavaScript/TypeScript SDK provides specific exceptions to handle various error scenarios effectively.

### Exception Types

- **`AuthenticationError`:** Raised when API authentication fails due to invalid or expired API keys.
- **`APIError`:** General API-related errors that don't fall under other specific categories.

### Example: Comprehensive Error Handling

```javascript
// JavaScript Example
const { AuthenticationError, APIError } = require('iqsuite-node-sdk');

(async () => {
  try {
    // Attempt to create an index with a document
    const taskResponse = await client.createIndex(documentBuffer, 'file.pdf');
  } catch (error) {
    if (error instanceof AuthenticationError) {
      // Handle invalid or expired API keys
      console.error(`Authentication failed: ${error.message}`);
    } else if (error instanceof APIError) {
      // Handle general API errors
      console.error(`API Error (${error.statusCode}): ${error.message}`);
    } else {
      // Handle unexpected errors
      console.error(`Unexpected Error: ${error.message}`);
    }
  }
})();
```

```typescript
// TypeScript Example
import { AuthenticationError, APIError } from 'iqsuite-node-sdk';

(async () => {
  try {
    // Attempt to create an index with a document
    const taskResponse = await client.createIndex(documentBuffer, 'file.pdf');
  } catch (error) {
    if (error instanceof AuthenticationError) {
      // Handle invalid or expired API keys
      console.error(`Authentication failed: ${error.message}`);
    } else if (error instanceof APIError) {
      // Handle general API errors
      console.error(`API Error (${error.statusCode}): ${error.message}`);
    } else {
      // Handle unexpected errors
      console.error(`Unexpected Error: ${(error as Error).message}`);
    }
  }
})();
```

**Explanation:**

- **try-catch Blocks:** Each exception type is caught and handled individually to provide specific error messages.
- **Descriptive Messages:** Informative messages help in understanding the nature of the error and possible remediation steps.

### Common HTTP Status Codes

Understanding HTTP status codes can aid in diagnosing issues when interacting with the API.

- **`400 Bad Request`:** The server could not understand the request due to invalid syntax. *Action:* Check your input parameters.
- **`401 Unauthorized`:** Authentication failed. *Action:* Verify your API key.
- **`403 Forbidden`:** You don't have the necessary permissions to access the resource. *Action:* Check your account permissions.
- **`404 Not Found`:** The requested resource does not exist. *Action:* Ensure the resource ID is correct.
- **`429 Too Many Requests`:** You've exceeded the allowed rate limit. *Action:* Wait before making more requests.
- **`500 Internal Server Error`:** The server encountered an unexpected condition. *Action:* Contact support.

> **⚠️ Warning:** *Always implement proper error handling in your application to manage unexpected scenarios gracefully and enhance user experience.*

## Support

We're dedicated to helping you make the most of the iQ Suite Platform. Whether you need technical assistance, want to provide feedback, or are looking for resources to learn more, our support channels are here for you.

### Documentation

Comprehensive documentation is available to guide you through every aspect of the iQ Suite Platform and the JavaScript/TypeScript SDK.

- 📚 [API Documentation](https://docs.iqsuite.ai/)
- 🔧 [SDK Reference](https://docs.iqsuite.ai/sdk/javascript)
- 📖 [Tutorials & Guides](https://docs.iqsuite.ai/tutorials)

### Getting Help

If you encounter issues or have questions, reach out through the following channels:

- 📧 [Email Support](mailto:support@iqsuite.ai): Contact our support team directly via email for personalized assistance.
- 💬 [Discord Community](https://discord.gg/iqsuite): Join our Discord server to interact with other users and developers, share experiences, and get real-time help.
- 🐛 [GitHub Issues](https://github.com/blue-hex/iqsuite-platform-js-sdk/issues): Report bugs or request new features by opening an issue on our GitHub repository.


*© 2025 iQ Suite. All rights reserved.*

> **💡 Tip:** *Engage with the community and stay updated with the latest developments to maximize the benefits of the iQ Suite Platform.*

---

*If you have any suggestions or feedback on this documentation, please feel free to [open an issue](https://github.com/blue-hex/iqsuite-platform-js-sdk/issues) on our GitHub repository.*