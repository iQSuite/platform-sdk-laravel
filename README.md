# iQ Suite JavaScript/TypeScript SDK
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
- [Support](#support)
- [License](#license)

## Installation

Installing the iQ Suite Laravel SDK is straightforward. Let's get started.

### Prerequisites

- **PHP 8.2^:** Ensure you have PHP version 8.2 or higher installed on your system.
- **composer:** Composer should be available.

### Steps to Install

1. **Open Your Terminal or Command Prompt:**

    - **Windows:** Press `Win + R`, type `cmd`, and hit `Enter`.
    - **macOS/Linux:** Open the Terminal application.

2. **Initialize Your Project (If Not Already Initialized):**
   ```bash
   composer create-project laravel/laravel iqsuite-sdk
   ```
   
3. **Install the SDK:**

    - **Using composer:**

      ```bash
      composer require iqsuite/platform-sdk-laravel
      ```

   This command downloads and installs the latest version of the iQ Suite Laravel SDK from packagist.

## Features

The iQ Suite Laravel SDK offers a wide range of features designed to make data retrieval and processing efficient and effective. Here's a detailed look at what you can do:

- 📄 **Multi-Format Document Support:** Easily ingest and process various document types, including PDFs, Word documents, PowerPoint presentations, and raw text files.

- 🔍 **Hybrid Semantic Search:** Combines traditional keyword-based search with advanced semantic understanding to deliver more accurate and relevant search results.

- 💬 **Natural Language Chat:** Interact with your documents using conversational queries, making data exploration intuitive and user-friendly.

- 🚀 **Instant RAG:** Perform immediate analysis on your data without the need to create and maintain persistent indices.

- 🔄 **Asynchronous Processing:** Handle long-running tasks efficiently using webhooks, allowing your application to remain responsive.

- ⚡ **Real-Time Notifications:** Receive instant updates on the status of your tasks, ensuring you're always informed about ongoing processes.

- **Tokenizer**: A free to use endpoint from iQ Suite which allows you to count the number of tokens via an API endpoint. Useful for calculating usage from raw text chunks or data.

- **Webhooks**: Manage webhooks to receive async data from iQ Suite platform.

- 🔒 **Secure API Authentication:** Protect your data and ensure secure interactions with robust API key management.

## Quick Start

This section will guide you through the initial steps to get your application up and running with the iQ Suite Laravel SDK. Whether you're setting up for the first time or integrating it into an existing project, these instructions will help you get started quickly.

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

    - **.env**

      ```bash
      IQSUITE_API_KEY=your_api_key_here
      ```

### Step 2: List all Indices

```php
use IQSuite\Platform\Facades\IQSuite;

public function listAllIndices()
{
    $response = IQSuite::getAllIndices();
    
    return $response;
}
```

Please refer to our SDK guide in our [documentation](https://docs.iqsuite.ai) for all the other available methods.

## Support

We're dedicated to helping you make the most of the iQ Suite Platform. Whether you need technical assistance, want to provide feedback, or are looking for resources to learn more, our support channels are here for you.

### Documentation

Comprehensive documentation is available to guide you through every aspect of the iQ Suite Platform and the JavaScript/TypeScript SDK.

- 📚 [API Documentation](https://docs.iqsuite.ai/)
- 🔧 [SDK Reference](https://docs.iqsuite.ai/sdk-reference/document-rag/create-index)
- 📖 [Tutorials & Guides](https://docs.iqsuite.ai) [**Coming soon**]

### Getting Help

If you encounter issues or have questions, reach out through the following channels:

- 📧 [Email Support](mailto:support@iqsuite.ai): Contact our support team directly via email for personalized assistance.
- 💬 [Discord Community](https://discord.gg/JWcdjkuDqR): Join our Discord server to interact with other users and developers, share experiences, and get real-time help.

*© 2025 iQ Suite. All rights reserved.*

> **💡 Tip:** *Engage with the community and stay updated with the latest developments to maximize the benefits of the iQ Suite Platform.*

---

*If you have any suggestions or feedback on this documentation, please feel free to [open an issue](https://github.com/iqsuite/platform-sdk-laravel/issues) on our GitHub repository.*